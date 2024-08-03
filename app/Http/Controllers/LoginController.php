<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login');
    }



    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    Session::put('user_info',[
                        'username' => Auth::user()->username,
                        'firstname' => Auth::user()->f_name,
                        'lastname' => Auth::user()->l_name,
                        'gender' => Auth::user()->genders,
                        'role_id' => Auth::user()->role_id,

                    ]);
                    return redirect()->intended(route('admin-home'));
                }else{
                    Session::put('user_info',[
                        'username' => Auth::user()->username,
                        'firstname' => Auth::user()->f_name,
                        'lastname' => Auth::user()->l_name,
                        'gender' => Auth::user()->genders,
                        'role_id' => Auth::user()->role_id,

                    ]);
                    return redirect()->intended(route('employee-home'));
                }
            }
        }
        return back()->withErrors(['username' => 'Invalid username or password']);

        
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
