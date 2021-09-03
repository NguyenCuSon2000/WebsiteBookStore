<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\AuthLogin;
use Session;


class AuthController extends Controller
{
    //
    public function getFormLogin()
    {
        return view('auth.login');
    }

    public function submitLogin(AuthLogin $request)
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
        else {
            return redirect()->route('login_auth')->with('msg', 'Đăng nhập thất bại');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login_auth');
    }
}
