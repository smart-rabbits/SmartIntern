<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Student([
            'username'    => $row[0],
            'password'    => $row[1],
            'name'    => $row[2],
            'IC'    => $row[3],
            'email'    => $row[4],
            'matricnum'    => $row[5],
            'gender'    => $row[6],
            'contact'    => $row[7],
            'address'    => $row[8],
            "companyIntern" => $row[9],
        ]);
    }
}
