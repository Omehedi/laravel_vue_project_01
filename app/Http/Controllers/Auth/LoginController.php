<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->except('_token');

        $auth = Auth::attempt($credentials);

        if ($auth) {
            return redirect('/admin/dashboard');
        }

        return redirect('/login')->with('error', 'Username or Password invalid');
    }


    public function logout(){
        Auth::logout();
    }
}