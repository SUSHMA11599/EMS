<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $req)
    {
        $req->validate([
            'username' => 'required | max:10',
            'password' => 'required | min:4 max:10',
        ]);

        $id = $req->input('username');
        $password = $req->input('password');

        $data = User::where('emp_id', '=', $id)->first();

        $userdata = DB::table('users')
            ->where('emp_id', $id)
            ->get();

        if ($data) {

            if ($password == $data->password) {

                if ($data->type_of_user == "Normal") {
                    return view('userDashboard', ['data' => $userdata]);
                } else if ($data->type_of_user == "Manager") {

                    $issues = DB::table('issues')
                        ->join('emp_issue', 'emp_issue.emp_id', '=', 'issues.emp_id')
                        ->where('manager_id', $data->emp_id)
                        ->select('issues.*')
                        ->groupBy('issues.issue_id')
                        ->get();

                    $projects = DB::table('projects')
                        ->join('emp_proj', 'emp_proj.project_id', '=', 'projects.project_id')
                        ->where('manager_id', $data->emp_id)
                        ->select('projects.*')
                        ->groupBy('projects.project_id')
                        ->get();

                    $array = ['userdata', 'issues', 'projects'];
                    return view('managerDashboard', compact($array));

                } else if ($data->type_of_user == "Admin") {
                    return view('AdminDashboard', ['data' => $userdata]);
                }

            } else {
                return back()->with('fail', 'invalid password');
            }

        } else {
            return back()->with('fail', 'invalid user name');
        }
    }

    
}
