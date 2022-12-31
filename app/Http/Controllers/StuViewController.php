<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StuViewController extends Controller
{
    public function index()
    {
        $users = DB::select('select * from studentsurvey');
        return view('view', ['users' => $users]);
    }
}
