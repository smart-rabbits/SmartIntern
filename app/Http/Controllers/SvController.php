<?php

namespace App\Http\Controllers;

//use App\Notifications\ContactFormMessage;
use App\Http\Controllers\Controller;
//use App\Http\Requests\svFormRequest;
//use App\Sv;
use DB;
use Illuminate\Http\Request;

class SvController extends Controller
{
    public function show()
 {
  return view('svSurvey.form');
 }

 public function index()
 {
     $svSurvey = SvSurvey::all()->toArray();
     return view('svSurvey.index', compact('svSurvey'));
 }

 public function insert(Request $request){
    $svName = $request->input('svName');
    $email = $request->input('email');
    $svCompany = $request->input('svCompany');
    $svStu = $request->input('svStu');
    $rate = $request->input('rate');
    $reason = $request->input('reason');
    $comment = $request->input('comment');
    
    $data=array('svName'=>$svName,"email"=>$email, "svCompany"=>$svCompany, "svStu"=>$svStu, "rate"=>$rate, "reason"=>$reason, "comment"=>$comment);
    DB::table('sv_survey')->insert($data);
    echo "Form submitted successfully.<br/>";
    echo '<a href = "/insert">Click Here</a> to go back.';
    }
}