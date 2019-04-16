<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:student');
    }
    public function showLoginForm(){
        return view('auth.student-login');
    }
    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        if (Auth::guard('student')->attempt(['email'=> $request->email,'password'=> $request->password],$request->remember))
        {
            return redirect()->intended(route('student'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
