<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

 public function view()
 {
    $data = DB::table('sv_survey')->get();
    return view('svSurvey.view', ['data'=> $data]);
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
    return redirect()->back()->with('success', 'Survey has been successfully added !');
    }
}