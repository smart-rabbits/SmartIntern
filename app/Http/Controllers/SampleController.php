<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SampleController extends Controller
{
    function index()
    {
        return view('login');
    }

    function validate_login(Request $request)
    {
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->type == 'admin') {
                return redirect()->route('admin.coor-dashboard');
            }else if (auth()->user()->type == 'com_sv') {
                return redirect()->route('com_sv.supervisor-dashboard');
            }else if (auth()->user()->type == 'fac_sv'){
                return redirect()->route('fac_sv.lecturer-dashboard');
            }else{
                return redirect()->route('student.student-dashboard');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }   
    }

    function dashboard()
    {
        if(Auth::check())
        {
            //return view('student-dashboard');
            if (auth()->user()->type == 'admin') {
                return redirect()->route('coor-dashboard');
            }else if (auth()->user()->type == 'com_sv') {
                return redirect()->route('supervisor-dashboard');
            }else if (auth()->user()->type == 'fac_sv'){
                return redirect()->route('lecturer-dashboard');
            }else{
                return redirect()->route('student-dashboard');
            }
        }

        return redirect('login')->with('success', 'you are not allowed to access');
    }

    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }
}
