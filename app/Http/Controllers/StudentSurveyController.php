<?php

namespace App\Http\Controllers;

// use App\Notifications\ContactFormMessage;
use App\Http\Controllers\Controller;
use App\StudentSurvey;
use Illuminate\Http\Request;

class StudentSurveyController extends Controller
{
    public function show()
    {
        return view('StudentSurvey.form');
    }

    public function survey(Request $req)
    {
        request()->validate([
            'name' => 'required',
            'matricnumber' => 'required',
            'email' => 'required',
            'yearcourse' => 'required',
            'company' => 'required',
            'compaddress' => 'required',
            'learn' => 'required',
            'prefer' => 'required',
            'preferwhy' => 'required'
        ]);

        // StudentSurvey::Create($data);
        // return redirect()->back()->with('success', 'Survey has been successfully submitted!');



        StudentSurvey::Insert([
            'name' => $req->input('name'),
            'matricnumber' => $req->input('matricnumber'),
            'contact' => $req->input('contact'),
            'email' => $req->input('email'),
            'yearcourse' => $req->input('yearcourse'),
            'company' => $req->input('company'),
            'compaddress' => $req->input('compaddress'),
            'learn' => $req->input('learn'),
            'prefer' => $req->input('prefer'),
            'preferwhy' => $req->input('preferwhy'),
        ]);

        return redirect()->back()->with('success', 'Survey has been successfully submitted!');
    }
}
