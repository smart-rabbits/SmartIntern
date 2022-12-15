<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
class SvViewController extends Controller
{
    public function index(){
        $users = DB::select('select * from sv_survey');
        return view('view',['users'=>$users]);
        }
}