<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\logbooks;
use Carbon\Carbon;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $logbooks = logbooks::where('student_id',auth()->user()->id)->latest()->get();

     return view('Student.index',compact('logbooks'));
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
     
        $TYPE = $request->input('TYPE');
        $ID = $request->input('ID');

        if($TYPE == "CREATE"){
            $logbook = logbooks::insertGetId([
                'type' => $request->input('type_col'),
                'student_id' => auth()->user()->id,
                'marks_sv' => 0,
                'marks_company' => 0,
                'total_marks' => 0,
                'notes' => $request->input('notes'),
                'created_by' =>  auth()->user()->id,
                'updated_at' => Carbon::now(),
                'updated_by' =>  auth()->user()->id
            ]);
        

            if ($request->file('document')) {
            $files = $request->file('document');


            foreach ($files as $key => $file) {
            $filename = $logbook . '-' . $file->getClientOriginalName();
            $file->move(public_path('/Logbook'), $filename);

            logbooks::where('id',$logbook)->update([
                'document' => $filename
            ]);

            }
             }

            return redirect()->back()->with('success', 'Logbook has been successfully created !');
        }
        else if($TYPE == "EDIT"){
        $logbook = logbooks::where('id',$ID)->update([
        'type' => $request->input('type_col'),
        'student_id' => auth()->user()->id,
        'notes' => $request->input('notes'),
        'updated_at' => Carbon::now(),
        'updated_by' =>  auth()->user()->id
        ]);
    
        if ($request->file('document')) {
        $files = $request->file('document');

        foreach ($files as $key => $file) {
        $filename = $ID . '-' . $file->getClientOriginalName();
        $file->move(public_path('/Logbook'), $filename);
        logbooks::where('id',$ID)->update([
            'document' => $filename
        ]);
        }
        }

        return redirect()->back()->with('success', 'Logbook has been successfully updated !');

        }
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


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        logbooks::where('id',$id)->delete();

        return redirect()->back()->with('success', 'Logbook has been successfully deleted !');
    }
}
