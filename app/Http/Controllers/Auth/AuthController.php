<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class AuthController extends Controller
{
    //
    public function getFormLogin()
    {
        return view('auth.login');
    }

    public function submitLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if (Auth::attempt([
            'username' => $username, 
            'password' => $password
            ])) {
            $user = User::where('username', $username)->first();
            Auth::login($user);
            return redirect()->route('/admin/index');
        }
    }
}
