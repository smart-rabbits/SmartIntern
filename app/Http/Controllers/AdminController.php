<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;
use App\FacultySupervisor;
use App\Company;
use App\CompanySupervisor;

class AdminController extends Controller
{
    public function students(Request $request)
    {

    $students =  Students::all();
    $fsupervisors =  FacultySupervisor::all();
    $csupervisors = CompanySupervisor::select('com_sv.id AS uid','com_sv.*','company.*')->leftJoin('company', 'com_sv.company_id', '=', 'company.id')->get();

    return view('Admin.students',compact('students','fsupervisors','csupervisors'));

    }

    public function fsupervisor(Request $request)
    {

    $fsupervisors =  FacultySupervisor::all();
    return view('Admin.fsupervisor',compact('fsupervisors'));

    }

    public function company(Request $request)
    {

    $companies =  Company::all();
    return view('Admin.companies',compact('companies'));
    }

    public function storeStudent(Request $request){


        $TYPE = $request->input('TYPE');
        $ID = $request->input('ID');


        if($TYPE == "CREATE"){
        
        //Check unique
        $checkemail = User::where('email',$request->input('email'))->count();

        if($checkemail > 0){
            return redirect()->back()->with('error', 'The Email already exist, Please try again');
        }

        $checkIC = Students::where('IC',$request->input('IC'))->count();

        if($checkIC > 0){
            return redirect()->back()->with('error', 'The IC already exist, Please try again');
        }

        $checkmatric = Students::where('matricNum',$request->input('matricNum'))->count();

        if($checkmatric > 0){
            return redirect()->back()->with('error', 'The Matric Number already exist, Please try again');
        }
   
        $student = User::insertGetId([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('IC')),
            'role' => 'Student',
            'updated_at' => Carbon::now()

            ]);

            Students::Insert([
                'FullName' => $request->input('FullName'),
                'user_id' => $student,
                'IC' => $request->input('IC'),
                'matricNum' => $request->input('matricNum'),
                'gender' => $request->input('gender'),
                'contact' => $request->input('contact'),
                'address' => $request->input('address'),
                'status' => 'Active',
                'company_id' => $request->input('company_id'),
                'faculty_sv_id' => $request->input('faculty_sv_id'),
                'CGPA' => $request->input('CGPA'),
                'Faculty' => $request->input('Faculty'),
                'Course' => $request->input('Course'),
                'Year' => $request->input('Year'),
                'updated_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Student has been successfully created !');

        } else if ($TYPE == "EDIT") {
            $getstudent = Students::where('id', $ID)->first();
            $getuser = User::where('id', $getstudent->user_id)->first();
            $checkemail = User::where('email', $request->input('email'))->count();

            if ($getuser->email != $request->input('email') && $checkemail > 0) {
                return redirect()->back()->with('error', 'The Email already exist, Please try again');
            }

            $checkIC = Students::where('IC', $request->input('IC'))->count();

            if ($getstudent->IC != $request->input('IC') && $checkIC > 0) {
                return redirect()->back()->with('error', 'The IC already exist, Please try again');
            }

            $checkmatric = Students::where('matricNum', $request->input('matricNum'))->count();

            if ($getstudent->matricNum != $request->input('matricNum') && $checkmatric > 0) {
                return redirect()->back()->with('error', 'The Matric Number already exist, Please try again');
            }


      

            $student = User::where('id',$getstudent->user_id)->update([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('IC')),
                'role' => 'Student',
                'updated_at' => Carbon::now()

            ]);

            Students::where('id', $ID)->update([
                'FullName' => $request->input('FullName'),
                'IC' => $request->input('IC'),
                'matricNum' => $request->input('matricNum'),
                'gender' => $request->input('gender'),
                'contact' => $request->input('contact'),
                'address' => $request->input('address'),
                'status' => 'Active',
                'company_id' => $request->input('company_id'),
                'faculty_sv_id' => $request->input('faculty_sv_id'),
                'CGPA' => $request->input('CGPA'),
                'Faculty' => $request->input('Faculty'),
                'Course' => $request->input('Course'),
                'Year' => $request->input('Year'),
                'updated_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Student has been successfully updated !');
        }

    }




    public function storefsupervisor(Request $request){


        $TYPE = $request->input('TYPE');
        $ID = $request->input('ID');


        if ($TYPE == "CREATE") {

            //Check unique
            $checkemail = User::where('email', $request->input('email'))->count();

            if ($checkemail > 0) {
                return redirect()->back()->with('error', 'The Email already exist, Please try again');
            }

            $checkIC = FacultySupervisor::where('IC', $request->input('IC'))->count();

            if ($checkIC > 0) {
                return redirect()->back()->with('error', 'The IC already exist, Please try again');
            }

            $checkstaffid = FacultySupervisor::where('staffID', $request->input('staffID'))->count();

            if ($checkstaffid > 0) {
                return redirect()->back()->with('error', 'The Staff ID already exist, Please try again');
            }

            $student = User::insertGetId([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('IC')),
                'role' => 'Faculty Supervisor',
                'updated_at' => Carbon::now()
            ]);

            FacultySupervisor::Insert([
                'FullName' => $request->input('FullName'),
                'user_id' => $student,
                'IC' => $request->input('IC'),
                'staffID' => $request->input('staffID'),
                'gender' => $request->input('gender'),
                'contact' => $request->input('contact'),
                'faculty' => $request->input('faculty'),
                'address' => $request->input('address'),
                'updated_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Faculty Supervisor has been successfully created !');

        }
        else if($TYPE == "EDIT"){
            $getstaff = FacultySupervisor::where('id',$ID)->first();
            $getuser = User::where('id',$getstaff->user_id)->first();
            $checkemail = User::where('email',$request->input('email'))->count();
            
            if($getuser->email != $request->input('email') && $checkemail > 0){
                return redirect()->back()->with('error', 'The Email already exist, Please try again');
            }
    
            $checkIC = FacultySupervisor::where('IC',$request->input('IC'))->count();
    
            if($getstaff->IC != $request->input('IC') && $checkIC > 0){
                return redirect()->back()->with('error', 'The IC already exist, Please try again');
            }

            $checkstaffid = FacultySupervisor::where('staffID',$request->input('staffID'))->count();

            if($getstaff->staffID != $request->input('staffID') && $checkstaffid > 0){
                return redirect()->back()->with('error', 'The Staff ID already exist, Please try again');
            }

            if(Hash::check($request->input('IC'), $getuser->password)){
                $password = Hash::make($request->input('IC'));
            }
            else{
                $password = $getuser->password;
            }
  
            $student = User::where('id',$getstaff->user_id)->update([

                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => $password,
                'role' => 'Faculty Supervisor',
                'updated_at' => Carbon::now()

            ]);

            FacultySupervisor::where('id', $ID)->update([
                'FullName' => $request->input('FullName'),
                'IC' => $request->input('IC'),
                'staffID' => $request->input('staffID'),
                'gender' => $request->input('gender'),
                'contact' => $request->input('contact'),
                'address' => $request->input('address'),
                'faculty' => $request->input('faculty'),
                'updated_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Faculty Supervisor has been successfully updated !');
        }
    }



    public function storecompany(Request $request)
    {

        $TYPE = $request->input('TYPE');
        $ID = $request->input('ID');

        if ($TYPE == "CREATE") {

            //Check unique
            $checkcompanyname = Company::where('company_name', $request->input('company_name'))->count();

            if ($checkcompanyname > 0) {
                return redirect()->back()->with('error', 'The Company Name already exist, Please try again');
            }

            $checkcompanyemail = Company::where('company_email', $request->input('company_email'))->count();

            if ($checkcompanyemail > 0) {
                return redirect()->back()->with('error', 'The Company Email already exist, Please try again');
            }

            $checksupemail = CompanySupervisor::where('email', $request->input('email'))->count();

            if ($checksupemail > 0) {
                return redirect()->back()->with('error', 'The Supervisor Email already exist, Please try again');
            }

            $checkIC = CompanySupervisor::where('IC', $request->input('IC'))->count();

            if ($checkIC > 0) {
                return redirect()->back()->with('error', 'The IC already exist, Please try again');
            }

            $user = User::insertGetId([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('IC')),
                'role' => 'Company Supervisor',
                'updated_at' => Carbon::now()
            ]);

            $company =         Company::insertGetId([
                'company_name' => $request->input('company_name'),
                'company_email' => $request->input('company_email'),
                'company_address' => $request->input('company_address'),
                'company_department' => $request->input('company_department'),
                'updated_at' => Carbon::now()
            ]);

            CompanySupervisor::insertGetId([
                'FullName' => $request->input('FullName'),
                'user_id' => $user,
                'IC' => $request->input('IC'),
                'email' => $request->input('email'),
                'gender' => $request->input('gender'),
                'contact' => $request->input('contact'),
                'company_id' =>  $company,
                'updated_at' => Carbon::now()
            ]);





            return redirect()->back()->with('success', 'Company has been successfully created !');
        } else if ($TYPE == "EDIT") {
            $getcompanysup = CompanySupervisor::where('id', $ID)->first();

            $getcompany = Company::where('id', $getcompanysup->company_id)->first();


            //Check unique
            $checkcompanyname = Company::where('company_name', $request->input('company_name'))->count();

            if ($getcompany->company_name != $request->input('company_name') && $checkcompanyname > 0) {
                return redirect()->back()->with('error', 'The Company Name already exist, Please try again');
            }

            $checkcompanyemail = Company::where('company_email', $request->input('company_email'))->count();

            if ($getcompany->company_email != $request->input('company_email') && $checkcompanyemail > 0) {
                return redirect()->back()->with('error', 'The Company Email already exist, Please try again');
            }

            $checksupemail = CompanySupervisor::where('email', $request->input('email'))->count();

            if ($getcompanysup->email != $request->input('email') && $checksupemail > 0) {
                return redirect()->back()->with('error', 'The Supervisor Email already exist, Please try again');
            }

            $checkIC = CompanySupervisor::where('IC', $request->input('IC'))->count();

            if ($getcompanysup->IC != $request->input('IC') && $checkIC > 0) {
                return redirect()->back()->with('error', 'The IC already exist, Please try again');
            }


            $user = User::where('id', $getcompanysup->user_id)->update([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('IC')),
                'role' => 'Company Supervisor',
                'updated_at' => Carbon::now()
            ]);

            $companysupervisor = CompanySupervisor::where('id', $ID)->update([
                'FullName' => $request->input('FullName'),
                'IC' => $request->input('IC'),
                'email' => $request->input('email'),
                'gender' => $request->input('gender'),
                'contact' => $request->input('contact'),
                'updated_at' => Carbon::now()
            ]);

            Company::where('id', $getcompany->id)->update([
                'company_name' => $request->input('company_name'),
                'company_email' => $request->input('company_email'),
                'company_address' => $request->input('company_address'),
                'company_department' => $request->input('company_department'),
                'updated_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Company details has been successfully updated !');
        }
    }



    public function destroy($id)
    {

        $getstudent =   User::where('id', $id)->first();

        Students::where('user_id', $getstudent->id)->delete();

        User::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Student has been successfully deleted !');
    }

    public function destroy2($id)
    {

        $getstaff =   User::where('id', $id)->first();

        FacultySupervisor::where('user_id', $getstaff->id)->delete();

        User::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Faculty Staff has been successfully deleted !');
    }

    public function destroy3($id)
    {

        $getsup =   CompanySupervisor::where('id', $id)->first();

        Company::where('id', $getsup->company_id)->delete();

        User::where('id', $getsup->user_id)->delete();

        CompanySupervisor::where('id', $id)->delete();


        return redirect()->back()->with('success', 'Company has been successfully deleted !');
    }



    public function storecompany(Request $request){

        $TYPE = $request->input('TYPE');
        $ID = $request->input('ID');

        if($TYPE == "CREATE"){
        
        //Check unique
        $checkcompanyname = Company::where('company_name',$request->input('company_name'))->count();

        if($checkcompanyname > 0){
            return redirect()->back()->with('error', 'The Company Name already exist, Please try again');
        }

        $checkcompanyemail = Company::where('company_email',$request->input('company_email'))->count();

        if($checkcompanyemail > 0){
            return redirect()->back()->with('error', 'The Company Email already exist, Please try again');
        }

        $checksupemail = CompanySupervisor::where('email',$request->input('email'))->count();

        if($checksupemail > 0){
            return redirect()->back()->with('error', 'The Supervisor Email already exist, Please try again');
        }

        $checkIC = CompanySupervisor::where('IC',$request->input('IC'))->count();

        if($checkIC > 0){
            return redirect()->back()->with('error', 'The IC already exist, Please try again');
        }
   
        $user = User::insertGetId([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('IC')),
            'role' => 'Company Supervisor',
            'updated_at' => Carbon::now()
            ]);

        $company =         Company::insertGetId([
            'company_name' => $request->input('company_name'),
            'company_email' => $request->input('company_email'),
            'company_address' => $request->input('company_address'),
            'company_department' => $request->input('company_department'),
            'updated_at' => Carbon::now()
        ]);

        CompanySupervisor::insertGetId([
            'FullName' => $request->input('FullName'),
            'user_id' => $user,
            'IC' => $request->input('IC'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'contact' => $request->input('contact'),
            'company_id' =>  $company,
            'updated_at' => Carbon::now()
        ]);

        



            return redirect()->back()->with('success', 'Company has been successfully created !');
        }
        else if($TYPE == "EDIT"){
            $getcompanysup = CompanySupervisor::where('id',$ID)->first();

            $getcompany = Company::where('id',$getcompanysup->company_id)->first();

            $getuser = User::where('id',$getcompanysup->user_id)->first();


            //Check unique
            $checkcompanyname = Company::where('company_name',$request->input('company_name'))->count();

            if($getcompany->company_name != $request->input('company_name') && $checkcompanyname > 0){
                return redirect()->back()->with('error', 'The Company Name already exist, Please try again');
            }

            $checkcompanyemail = Company::where('company_email',$request->input('company_email'))->count();

            if($getcompany->company_email != $request->input('company_email') && $checkcompanyemail > 0){
                return redirect()->back()->with('error', 'The Company Email already exist, Please try again');
            }

            $checksupemail = CompanySupervisor::where('email',$request->input('email'))->count();

            if($getcompanysup->email != $request->input('email') && $checksupemail > 0){
                return redirect()->back()->with('error', 'The Supervisor Email already exist, Please try again');
            }

            $checkIC = CompanySupervisor::where('IC',$request->input('IC'))->count();

            if($getcompanysup->IC != $request->input('IC') && $checkIC > 0){
                return redirect()->back()->with('error', 'The IC already exist, Please try again');
            }

            if(Hash::check($request->input('IC'), $getuser->password)){
                $password = Hash::make($request->input('IC'));
            }
            else{
                $password = $getuser->password;
            }

        
            $user = User::where('id',$getcompanysup->user_id)->update([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => $password,
                'role' => 'Company Supervisor',
                'updated_at' => Carbon::now()
                ]);
    
            $companysupervisor = CompanySupervisor::where('id',$ID)->update([
                'FullName' => $request->input('FullName'),
                'IC' => $request->input('IC'),
                'email' => $request->input('email'),
                'gender' => $request->input('gender'),
                'contact' => $request->input('contact'),
                'updated_at' => Carbon::now()
            ]);
    
            Company::where('id', $getcompany->id)->update([
                'company_name' => $request->input('company_name'),
                'company_email' => $request->input('company_email'),
                'company_address' => $request->input('company_address'),
                'company_department' => $request->input('company_department'),
                'updated_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Company details has been successfully updated !');
        }



        
    }



    public function destroy($id){

        $getstudent =   User::where('id',$id)->first();

        Students::where('user_id',$getstudent->id)->delete();

        User::where('id',$id)->delete();

        return redirect()->back()->with('success', 'Student has been successfully deleted !');

    }

    public function destroy2($id){

        $getstaff =   User::where('id',$id)->first();

        FacultySupervisor::where('user_id',$getstaff->id)->delete();

        User::where('id',$id)->delete();

        return redirect()->back()->with('success', 'Faculty Staff has been successfully deleted !');

    }

    public function destroy3($id){

        $getsup =   CompanySupervisor::where('id',$id)->first();

        Company::where('id',$getsup->company_id)->delete();

        User::where('id',$getsup->user_id)->delete();

        CompanySupervisor::where('id',$id)->delete();

        return redirect()->back()->with('success', 'Company has been successfully deleted !');

    }



    
}
