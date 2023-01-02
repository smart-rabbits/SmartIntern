<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class StuSurveyController extends Controller
{
    public function stushow()
    {
        return view('stuSurvey.stuform');
    }

    public function stuindex()
    {
        $stuSurvey = StuSurvey::all()->toArray();
        return view('stuSurvey.stuindex', compact('stuSurvey'));
    }

    public function stuview()
 {
    $data = DB::table('studentsurvey')->get();
    return view('stuSurvey.stuview', ['data'=> $data]);
 }

    public function stuinsert(Request $request)
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
        return redirect()->back()->with('success', 'Survey has been successfully added !');
    }
}
