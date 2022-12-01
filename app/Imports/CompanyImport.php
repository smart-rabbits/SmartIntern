<?php

namespace App\Imports;

use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CompanyImport implements ToModel, WithStartRow
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
        return new Company([
            'CompanyName'    => $row[0],
            'email'    => $row[1],
            'address'    => $row[2],
            'supervisor'    => $row[3],
        ]);
    }
}
