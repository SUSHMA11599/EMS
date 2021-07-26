<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class loginController extends Controller
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

        if ($data) {

            if ($password == $data->password) {
                return view('userdashboard');
            } else {
                return back()->with('fail', 'invalid password');
            }

        } else {
            return back()->with('fail', 'invalid ID');
        }
    }

}
