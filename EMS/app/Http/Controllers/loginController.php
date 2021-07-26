<?php
namespace App\Http\Controllers;

use App\Models\Issue;
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

                    $issues = $issue = Issue::all();

                    $array = ['userdata', 'issues'];
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

    public function updateMobile(Request $req)
    {
        $User = User::where('type_of_user', 'Normal')->update(array('phone_number' => $req->newMobileNumber));
       
        return redirect()->back()->with('message','mobile Number updated');
    }
    public function updateAddress(Request $req)
    {
        $User = User::where('type_of_user', 'Normal')->update(array('comm_address' => $req->newAddress));
        //echo "Address updated";
        return redirect()->back()->with('message','Address updated');
    }
}
