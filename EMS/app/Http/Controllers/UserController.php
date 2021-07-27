<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateMobile(Request $req)
    {

        $User = User::where('type_of_user', 'Normal')
            ->update(array('phone_number' => $req->newMobileNumber));
        echo $User;

        return redirect()->back()->with('message', 'mobile Number updated');

    }

    public function updateAddress(Request $req)
    {
        $User = User::where('type_of_user', 'Normal')
            ->update(array('comm_address' => $req->newAddress));
        return redirect()->back()->with('message', 'Address updated');

    }

}
