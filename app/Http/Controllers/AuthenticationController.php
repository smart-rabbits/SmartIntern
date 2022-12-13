<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash; 
use App\CompanySupervisor;
use App\Admin;
use App\Students;
use App\FacultySupervisor;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $role = $request->input('role');

        if($role == 'admin'){

        $user = Admin::where('staffID',$request->input('staffid'))->first();

        if($user != ''){

            $user = User::where('id',$user->user_id)->first();

            if(Hash::check($request->input('password'), $user->password)){
                auth()->login($user);

                return redirect()->to('/home');
            }
            else{
                return redirect()->back()->with('error', 'The Staff ID or Password is incorrect, Please try again');
            }

        }
        else{
            return redirect()->back()->with('error', 'The Staff ID or Password is incorrect, Please try again');
        }

        }
        else if($role == 'student'){


            $user = Students::where('matricNum',$request->input('matricno'))->first();

            if($user != ''){
    
                $user = User::where('id',$user->user_id)->first();
    
                if(Hash::check($request->input('password'), $user->password)){
                    auth()->login($user);
    
                    return redirect()->to('/home');
                }
                else{
                    return redirect()->back()->with('error', 'The Matric No or Password is incorrect, Please try again');
                }
    
            }
            else{
                return redirect()->back()->with('error', 'The Matric No or Password is incorrect, Please try again');
            }

        }
        else if($role == 'fsup'){

            $user = FacultySupervisor::where('staffID',$request->input('staffid'))->first();

            if($user != ''){
    
                $user = User::where('id',$user->user_id)->first();
    
                if(Hash::check($request->input('password'), $user->password)){
                    auth()->login($user);
    
                    return redirect()->to('/home');
                }
                else{
                    return redirect()->back()->with('error', 'The Staff ID or Password is incorrect, Please try again');
                }
    
            }
            else{
                return redirect()->back()->with('error', 'The Staff ID or Password is incorrect, Please try again');
            }

        }
        else if($role == 'csup'){

            $user = CompanySupervisor::where('email',$request->input('email'))->first();

            if($user != ''){
    
                $user = User::where('id',$user->user_id)->first();
    
                if(Hash::check($request->input('password'), $user->password)){
                    auth()->login($user);
    
                    return redirect()->to('/home');
                }
                else{
                    return redirect()->back()->with('error', 'The Email or Password is incorrect, Please try again');
                }
    
            }
            else{
                return redirect()->back()->with('error', 'The Email or Password is incorrect, Please try again');
            }

        }

    }


    public function signout(Request $request)
    {
        auth()->logout();
        return redirect('/');
    }
}
