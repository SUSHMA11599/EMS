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
        $req->validate([
            'project_name' => 'required',
            'project_desc' => 'required',
            'project_start_date' => 'required|before_or_equal:project_end_date',
            'project_end_date' => 'required|after_or_equal:project_start_date'
        ]);
         
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
        $normalEmp = DB::table('users AS u')
            ->join('emp_proj AS ep', 'ep.emp_id', '=', 'u.emp_id')
            ->join('projects AS p', 'ep.project_id', '=', 'p.project_id')
            ->join('users AS u1' , 'ep.manager_id' ,'=','u1.emp_id')
            ->select('p.project_id', 'ep.emp_id', 'ep.manager_id', 'u.type_of_user', 'u1.first_name' ,'u1.last_name','p.project_name', 'p.project_desc')
            ->where('u.emp_id', '=', $id)
            ->get();

        $managerEmp = DB::table('users AS u')
            ->join('emp_proj AS ep', 'ep.manager_id', '=', 'u.emp_id')
            ->join('projects AS p', 'ep.project_id', '=', 'p.project_id')
            ->select('p.project_id', 'ep.emp_id', 'ep.manager_id', 'u.type_of_user', 'p.project_name', 'p.project_desc')
            ->where('u.emp_id', '=', $id)
            ->get();

        $array = ['normalEmp', 'managerEmp'];
        return view('displayProj', compact($array));
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
        return view('editEmployee', ['emp' => $res]);
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
        $req->validate([
            'project_name' => 'required',
            'project_desc' => 'required',
            'project_start_date' => 'required|before_or_equal:project_end_date',
            'project_end_date' => 'required|after_or_equal:project_start_date'
        ]);
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

    public function deleteProj($id)
    {
        $del = DB::table('projects')
            ->where('project_id', $id)
            ->delete();
        if ($del) {
            return redirect()->back()->with('message', 'user deleted successfully');
        } else {
            return redirect()->back()->with('message', 'could not delete');
        }
    }

}
