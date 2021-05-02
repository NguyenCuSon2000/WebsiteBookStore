<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use App\Models\Users;
use Hash;
session_start();

class LoginController extends Controller
{
    //
    public function index()
    {
       return view("admin.login");
    }

    public function login(Request $req)
    {
          //
          $us = $req->username;
          $pw = $req->password;
        //   Hash::check($request->newPasswordAtLogin, $hashedPassword)
  
           $result = Users::where('username', $us)->where('password', $pw)->first();
        //    dd($result);
          if($result == true){
              Session::put('username', $result->username);
              Session::put('password', $result->password);

              return redirect()->route('/admin/index');
          }
          else{
              Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
              return redirect()->route('/login/index');
          }
    }

    public function logout()
    {
        Session::put('us',null);
        Session::put('id',null);
        return redirect()->route("/login/index");
    }
}
