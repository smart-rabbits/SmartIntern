<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    function show()
    {
        $data = Student::all();
        return view('student', ['student' => $data]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    function index()
    {
        $data = DB::table('student')->get();
        return view('student', compact('data'));
    }

    function addStudent()
    {
        return view('addStudent');
    }

    function saveStudent(Request $request)
    {
        $request->validate([
            'username'      =>  'required',
            'password'      =>  'required',
            'name'          =>  'required',
            'IC'            =>  'required',
            'email'         =>  'required|email',
            'matricnum'     =>  'required',
            'gender'        =>  'required',
            'contact'       =>  'required',
            'address'       =>  'required',
            "companyIntern" =>  'required',
        ]);

        $student = new Student;

        $student->username = $request->username;
        $student->password = $request->password;
        $student->name = $request->name;
        $student->IC = $request->IC;
        $student->email = $request->email;
        $student->matricnum = $request->matricnum;
        $student->gender = $request->gender;
        $student->contact = $request->contact;
        $student->address = $request->address;
        $student->companyIntern = $request->companyIntern;

        $student->save();

        return redirect()->back()->with('success', 'Student Added successfully.');
    }

    function editStudent($username)
    {
        $data = Student::where('username', '=', $username)->first();
        return view('editStudent', compact('data'));
    }

    function updateStudent(Request $request)
    {
        $request->validate([
            'username'    =>  'required',
            'password'          =>  'required',
            'name'        =>  'required',
            'IC'     =>  'required',
            'email'          =>  'required|email',
            'matricnum'     =>  'required',
            'gender'    =>  'required',
            'contact'     =>  'required',
            'address'        =>  'required',
            'companyIntern'        =>  'required',
        ]);

        $username = $request->username;
        $password = $request->password;
        $name = $request->name;
        $IC = $request->IC;
        $email = $request->email;
        $matricnum = $request->matricnum;
        $gender = $request->gender;
        $contact = $request->contact;
        $address = $request->address;
        $companyIntern = $request->companyIntern;

        Student::where('username', '=', $username)->update([
            'username' => $username,
            'password' => $password,
            'name' => $name,
            'IC' => $IC,
            'email' => $email,
            'matricnum' => $matricnum,
            'gender' => $gender,
            'contact' => $contact,
            'address' => $address,
            'companyIntern' => $companyIntern,
        ]);
        return redirect()->back()->with('success', 'Student Edited successfully.');
    }

    function deleteStudent($username)
    {
        Student::where('username', '=', $username)->delete();
        return redirect()->back()->with('success', 'Student Deleted successfully.');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new StudentExport, 'student.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */

    function importStudent()
    {
        Excel::Import(new StudentImport, request()->file('file'));
        //return redirect()->back();
        return redirect()->back()->with('success', 'Student Excel Added successfully.');
    }

    public function insertform()
    {
        return view('addStudent');
    }
    public function insert(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);
        $path = $request->file('file')->getRealPath();

        $data = Excel::load($path)->get();

        $username = $request->input('username');
        $password = $request->input('password');
        $name = $request->input('name');
        $IC = $request->input('IC');
        $email = $request->input('email');
        $matricnum = $request->input('matricnum');
        $gender = $request->input('gender');
        $contact = $request->input('contact');
        $address = $request->input('address');
        $companyIntern = $request->input('companyIntern');

        $data = array(
            'username' => $username, "password" => $password, "name" => $name,
            "IC" => $IC, 'email' => $email, "matricnum" => $matricnum, "gender" => $gender,
            "contact" => $contact, 'address' => $address, 'companyIntern' => $companyIntern
        );
        DB::table('student')->insert($data);

        echo "Record inserted successfully.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
    }
}
