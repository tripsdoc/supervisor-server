<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    function login(Request $request) {
        $check = DB::table('HSC2017.dbo.IPS_ForkliftUser')
        ->where('UserName', $request->username)
        ->where('Password', $request->password)->first();

        if(!$check) {
            $response['status'] = FALSE;
            $response['error'] = 'Username or Password not correct';
            $response['profile'] = $check;
        } else {
            $response['status'] = TRUE;
            $response['error'] = '';
            $response['profile'][0] = $check;
        }
        return response($response);
    }
}
