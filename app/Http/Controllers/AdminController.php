<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use Illuminate\Support\Facades\Hash; 
use App\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function students(Request $request)
    {
    $students =  Students::all();
    return view('Admin.students',compact('students'));
    }

    public function storeStudent(Request $request){
   
        $student = User::insertGetId([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('IC')),
            'role' => 'Student',
            'updated_at' => Carbon::now()
            ]);

            Students::Insert([
                'FullName' => $request->input('username'),
                'user_id' => $student,
                'IC' => $request->input('IC'),
                'matricNum' => $request->input('matricNum'),
                'gender' => $request->input('gender'),
                'contact' => $request->input('contact'),
                'address' => $request->input('address'),
                'status' => 'Active',
                'company_id' => $request->input('company_id'),
                'updated_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Student has been successfully created !');

        
    }
}
