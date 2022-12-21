<?php

namespace App\Http\Controllers;

// use App\Notifications\ContactFormMessage;
use App\Http\Controllers\Controller;
use App\StuSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StuSurveyController extends Controller
{
    public function show()
    {
        return view('stuSurvey.form');
    }

    public function index()
    {
        $stuSurvey = StuSurvey::all()->toArray();
        return view('stuSurvey.index', compact('stuSurvey'));
    }

    public function insert(Request $request)
    {
        $name = $request->input('name');
        $matricnumber = $request->input('matricnumber');
        $contact = $request->input('contact');
        $email = $request->input('email');
        $yearcourse = $request->input('yearcourse');
        $company = $request->input('company');
        $compaddress = $request->input('compaddress');
        $learn = $request->input('learn');
        $prefer = $request->input('prefer');
        $preferwhy = $request->input('preferwhy');

        $data = array(
            'name' => $name,
            'matricnumber' => $matricnumber,
            'contact' => $contact,
            'email' => $email,
            'yearcourse' => $yearcourse,
            'company' => $company,
            'compaddress' => $compaddress,
            'learn' => $learn,
            'prefer' => $prefer,
            'preferwhy' => $preferwhy,
        );
        DB::table('studentsurvey')->insert($data);
        echo "Form submitted successfully.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
    }
}
