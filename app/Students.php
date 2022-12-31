<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'student';
    protected $fillable = [

        'id', 'FullName', 'user_id', 'IC', 'matricNum', 'gender', 'contact', 'address', 'status', 'company_id', 'faculty_sv_id', 'CGPA', 'Faculty', 'Course', 'Year', 'created_at', 'updated_at'

    ];

    public function FACULTY()
    {
        return $this->belongsTo('App\FacultySupervisor', 'faculty_sv_id');
    }

    public function COMPANY()
    {
        return $this->belongsTo('App\CompanySupervisor', 'company_id');
    }
}
