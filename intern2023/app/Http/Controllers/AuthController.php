<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function login(Request $request){
        $inputs = $request->all();

        $v = validator($inputs, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        }

        $attempt = Auth::attempt([
            'email' => $inputs['email'],
            'password' => $inputs['password'],
        ]);

        if (!$attempt){
            return back()->withErrors('Email or password not correct', 401);
        }
        return redirect( url('/admin/pdRkAAT+XxepOb8drasiSw==') );

    }

    public function loginForm(){
        return view('auth.login');
    }

   
    public function register(Request $request)
    {
        $inputs = $request->all();

        $v = validator($inputs, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v);
        }

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->role_id = ADMIN_ROLE;
        $user->save();
        return redirect( url('/admin/pdRkAAT+XxepOb8drasiSw==') );
    }

    public function registerForm(){
        return view('auth.register');
    }

    public function logout(){
        Auth::logout();
        return redirect(url('/admin/pdRkAAT+XxepOb8drasiSw==/login'));
    }
    
   

}
