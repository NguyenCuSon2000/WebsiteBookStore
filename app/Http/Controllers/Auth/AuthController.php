<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Socialites;
use Socialite;
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


    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Socialites::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri  
            $account_name = User::where('id', $account->user)->first();
            Auth::login($account_name);    
            return redirect('/')->with('message', 'Đăng nhập Admin thành công');
        }else{
            $social = new Socialites([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);
            $orang = User::where('email',$provider->getEmail())->first();

            if(!$orang){
                $orang = User::create([
                    'username' => $provider->getName(),
                    'password' => '',
                    'email' => $provider->getEmail(),
                    'status' => '',
                ]);
            }
            $social->login()->associate($orang);
            $social->save();

            $account_name = User::where('id',$social->user_id)->first();
            Auth::login($account_name);
            return redirect('/')->with('message', 'Đăng nhập Admin thành công');
        } 
    }


    public function login_google(){
        return Socialite::driver('google')->redirect();
    }

    public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user(); 
        $authUser = $this->findOrCreateUser($users,'google');  
        $account_name = User::where('id',$authUser->user_id)->first();
        Auth::login($account_name);   
        return redirect('/')->with('message', 'Đăng nhập Admin thành công');
    }

    public function findOrCreateUser($users,$provider){
        $authUser = Socialites::where('provider_user_id', $users->id)->first();
        if($authUser){
            return $authUser;
        }    
        $social = new Socialites([
            'provider_user_id' => $users->id,
            'provider' => strtoupper($provider)
        ]);
        $orang = User::where('email',$users->email)->first();
        if(!$orang){
            $orang = User::create([
                'username' => $users->name,
                'email' => $users->email,
                'password' => '',
                'status' => 1
            ]);
        }
        $social->login()->associate($orang);
        $social->save();
        $account_name = User::where('id',$social->user_id)->first();
        Auth::login($account_name);
        return redirect('/')->with('message', 'Đăng nhập Admin thành công');
    }
}
