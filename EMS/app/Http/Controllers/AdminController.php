<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function delete($id)
    {

        $del = DB::table('users')
            ->where('emp_id', $id)
            ->delete();
        if ($del) {
            return redirect()->back()->with('success', 'user deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'could not delete');
        }
    }

    public function addProject(Request $req)
    {
        $project = new Project;
        $project->project_name = $req->project_name;
        $project->project_desc = $req->project_desc;
        $project->project_start_date = $req->start_date;
        $project->project_end_date = $req->end_date;
        $project->save();

        return "added project";
    }

    public function getProjDetails($id)
    {

        $res = DB::table('users')
            ->join('emp_proj', 'emp_proj.emp_id', '=', 'users.emp_id')
            ->join('projects', 'emp_proj.project_id', '=', 'projects.project_id')
            ->select('projects.project_id', 'emp_proj.emp_id', 'users.first_name','emp_proj.manager_id', 'projects.project_name', 'projects.project_desc')
            ->where('users.emp_id', '=', $id)
            ->get();
        return view('displayProj', ['proj' => $res]);
    }

    public function getEmpDetails($id)
    {

        $res = DB::table('users')
            ->where('users.emp_id', '=', $id)
            ->get();
        return view('dispEmp', ['emp' => $res]);
    }

    public function updateStatus(Request $req)
    {
        // $res = Issue::where('issue_id', "=", $req->id)
        //     ->update(['status' => $req->status]);

        $res = DB::update('update issues set status=? where issue_id = ?', [$req->status, $req->id]);
        if ($res) {
            return redirect()->back()->with('success', 'user deleted successfully');
        } else {
            return redirect()->back()->with('success', 'user deleted successfully');
        }
    }

    public function showEmpDetails($id)
    {
        $res = DB::table('users')
            ->where('users.emp_id', '=', $id)
            ->get();
        return view('displayEmployee', ['emp' => $res]);
    }

    public function showProjDetails($id)
    {
        $res = DB::table('projects')
            ->where('projects.project_id', '=', $id)
            ->get();
        // echo $res;
        return view('editProject', ['proj' => $res]);
    }

    public function updateProjectDetails(Request $req)
    {
        //echo $req;
        $project = Project::find($req->id);
        $project->project_name = $req->input('project_name');
        $project->project_desc = $req->input('project_desc');
        $project->project_start_date = $req->input('project_start_date');
        $project->project_end_date = $req->input('project_end_date');
        $project->save();

        echo "$project";

        return view('adminDashboard');

    }

    public function updateEmpDetails(Request $req)
    {
        //echo $req;
        $user = User::find($req->id);
        $user->phone_number = $req->input('phone_number');
        $user->comm_address = $req->input('comm_address');
        $user->DOB = $req->input('DOB');
        $user->gender = $req->input('gender');
        $user->city = $req->input('city');
        $user->type_of_user = $req->input('type_of_user');
        $user->save();

        echo "$user";
        return view('adminDashboard');

    }

}
