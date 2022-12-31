<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\CompanySupervisor;
use App\logbooks;

class CompanySupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = CompanySupervisor::where('user_id',auth()->user()->id)->first()->company_id;

      $students =  Students::where('company_id',$id)->get();

      return view('CompanySupervisor.myStudents',compact('students'));
    }


    public function logbooks($id)
    {
      $logbooks = logbooks::where('student_id',$id)->latest()->get();

      $students =  Students::where('user_id',$id)->first();

      return view('CompanySupervisor.logbooks',compact('logbooks','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ID = $request->input('ID');

        $getLogbook = logbooks::where('id',$ID)->first();

        $totalmarks = ($request->input('marks_company')+$getLogbook->marks_sv) / 200 * 100;

        logbooks::where('id',$ID)->update([
            "marks_company" => $request->input('marks_company'),
            "total_marks" => $totalmarks,
        ]);

        return redirect()->back()->with('success', 'Logbook has been successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
