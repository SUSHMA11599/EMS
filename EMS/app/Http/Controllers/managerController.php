<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    public function addEmployee(Request $req)
    {
        $req->validate([
            'emp_id' => 'required',
            'proj_id' => 'required ',
        ]);

        $eid = $req->input('emp_id');
        $mid = $req->input('manager_id');
        $pid = $req->input('proj_id');

        $values = array('emp_id' => "$eid", 'manager_id' => "$mid", 'project_id' => "$pid");

        $add = DB::table('emp_proj')->insert($values);
        if ($add) {
            return back()->with('success', 'Employee Added Successfully');
        } else {
            return back()->with('fail','Cannot ADD Employee');
        }

    }
    public function deleteEmployee(Request $req)
    {
        $req->validate([
            'emp_id' => 'required',
        ]);

        $eid = $req->input('emp_id');
        $del = DB::table('emp_proj')->where('emp_id', $eid)->delete();
        echo $del;
        if ($del) {
            return back()->with('success', 'Employee Deleted');
        } else {
            return back()->with('fail','Cannot Delete Employee');
        }
    }
}
