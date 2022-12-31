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
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

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

    public function profile(Request $request)
    {
       return view('profile');
    }

    public function profileupd(Request $request){

        if(auth()->user()->role == 'Student'){
         $getstd = Students::where('user_id',auth()->user()->id)->first();

         Students::where('id',$getstd->id)->update([
            "FullName" => $request->input('FullName'),
            "gender" => $request->input('gender'),
            "contact" => $request->input('contact'),
            "address" => $request->input('address'),
         ]);

         
        }
        else if(auth()->user()->role == 'Admin'){
            $getstd = Admin::where('user_id',auth()->user()->id)->first();
            Admin::where('id',$getstd->id)->update([
                "gender" => $request->input('gender'),
                "contact" => $request->input('contact'),
                "address" => $request->input('address'),
             ]);
        }
        else if(auth()->user()->role == 'Faculty Supervisor'){
            $getstd = FacultySupervisor::where('user_id',auth()->user()->id)->first();
            FacultySupervisor::where('id',$getstd->id)->update([
                "FullName" => $request->input('FullName'),
                "gender" => $request->input('gender'),
                "contact" => $request->input('contact'),
                "address" => $request->input('address'),
             ]);
        }
        else if(auth()->user()->role == 'Company Supervisor'){
            $getstd = CompanySupervisor::where('user_id',auth()->user()->id)->first();
            CompanySupervisor::where('id',$getstd->id)->update([
                "FullName" => $request->input('FullName'),
                "gender" => $request->input('gender'),
                "contact" => $request->input('contact')
             ]);
        }
        return redirect()->back()->with('success', 'Your profile has been successfully updated!');
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function changepass(Request $request){

        $current_pass = $request->input('currentPassword');
        $newpassword = $request->input('newPassword');
        $renewpassword = $request->input('renewPassword');



        if(Hash::check($current_pass, auth()->user()->password)){

            if($newpassword != $renewpassword){
                return redirect()->back()->with('error', 'New Password does not match with confirm password!');
            }
            User::where('id',auth()->user()->id)->update([
                "password" =>  Hash::make($newpassword ),
            ]);
            return redirect()->back()->with('success', 'Password has been successfully updated!');
        }
        else{
            return redirect()->back()->with('error', 'Incorrect Current Password!');
        }



    }
}
