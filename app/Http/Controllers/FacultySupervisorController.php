<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\FacultySupervisor;
use App\logbooks;

class FacultySupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = FacultySupervisor::where('user_id',auth()->user()->id)->first()->id;

      $students =  Students::where('faculty_sv_id',$id)->get();

      return view('FacultySupervisor.myStudents',compact('students'));
    }


    public function logbooks($id)
    {
      $logbooks = logbooks::where('student_id',$id)->latest()->get();

      $students =  Students::where('user_id',$id)->first();

      return view('FacultySupervisor.logbooks',compact('logbooks','students'));
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

        $totalmarks = ($request->input('marks_sv')+$getLogbook->marks_company) / 200 * 100;

        logbooks::where('id',$ID)->update([
            "marks_sv" => $request->input('marks_sv'),
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
