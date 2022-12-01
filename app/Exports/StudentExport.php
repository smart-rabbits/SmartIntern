<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Student::select("username", "password", "name", "IC", "email", "matricnum", "gender", "contact", "address", "companyIntern")->get();
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["username", "password", "name", "IC", "email", "matricnum", "gender", "contact", "address", "companyIntern"];
    }
}
