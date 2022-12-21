<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('users.username','users.email','Student.FullName', 'Student.IC', 'Student.matricNum', 'Student.gender', 'Student.contact', 'Student.address', 'Student.company_id', 'Student.faculty_sv_id', 'Student.CGPA', 'Student.Faculty', 'Student.Course', 'Student.Year')->leftJoin('student', 'users.id', '=', 'student.user_id')->where('users.role','Student')->get();
    }

    public function headings(): array
    {
        return ["Username", "Email", "Fullname","IC","Matric No","Gender","Contact","Address","Company ID","Faculty SV ID","CGPA","Faculty","Course","Year"];
    }
}
