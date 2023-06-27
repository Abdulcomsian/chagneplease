<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function authenticate(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email , 'password' => $request->password ], $request->get('remember')))
        {
            return redirect()->route('admin.dashboard');
        }else{
            session()->flash('error','Either Email/Password Incorrect');
            return back()->withInput($request->only('email'));
        }
    }

    public function login()
    {
        return view('admin_auth.login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
