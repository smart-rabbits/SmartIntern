<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Exports\CompanyExport;
use App\Imports\CompanyImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    //
    function show()
    {
        $data = Company::all();
        return view('company', ['company' => $data]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    function index()
    {
        $data = DB::table('company')->get();
        return view('company', compact('data'));
    }

    function addCompany()
    {
        return view('addCompany');
    }

    function saveCompany(Request $request)
    {
        $request->validate([
            'CompanyName'    =>  'required',
            'email'          =>  'required|email',
            'address'        =>  'required',
            'supervisor'     =>  'required',
        ]);

        $company = new Company;

        $company->CompanyName = $request->CompanyName;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->supervisor = $request->supervisor;

        $company->save();

        return redirect()->back()->with('success', 'Company Added successfully.');
    }

    function editCompany($CompanyName)
    {
        $data = Company::where('CompanyName', '=', $CompanyName)->first();
        return view('editCompany', compact('data'));
    }

    function updateCompany(Request $request)
    {
        $request->validate([
            'CompanyName'    =>  'required',
            'email'          =>  'required|email',
            'address'        =>  'required',
            'supervisor'     =>  'required',
        ]);

        $CompanyName = $request->CompanyName;
        $email = $request->email;
        $address = $request->address;
        $supervisor = $request->supervisor;

        Company::where('CompanyName', '=', $CompanyName)->update([
            'CompanyName' => $CompanyName,
            'email' => $email,
            'address' => $address,
            'supervisor' => $supervisor
        ]);
        return redirect()->back()->with('success', 'Company Edited successfully.');
    }

    function deleteCompany($CompanyName)
    {
        Company::where('CompanyName', '=', $CompanyName)->delete();
        return redirect()->back()->with('success', 'Company Deleted successfully.');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new CompanyExport, 'company.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */

    function import()
    {
        Excel::Import(new CompanyImport, request()->file('file'));
        //return redirect()->back();
        return redirect()->back()->with('success', 'Company Excel Added successfully.');
    }

    public function insertform()
    {
        return view('addCompany');
    }
    public function insert(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);
        $path = $request->file('file')->getRealPath();

        $data = Excel::load($path)->get();

        $CompanyName = $request->input('CompanyName');
        $email = $request->input('email');
        $address = $request->input('address');
        $supervisor = $request->input('supervisor');
        $data = array('CompanyName' => $CompanyName, "email" => $email, "address" => $address, "supervisor" => $supervisor);
        DB::table('company')->insert($data);

        echo "Record inserted successfully.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
    }
}
