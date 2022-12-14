<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSurvey extends Model
{
    protected $table = 'studentsurvey';
    protected $fillable = [
        'name', 'matricnumber', 'contact', 'email', 'yearcourse', 'company', 'compaddress', 'learn', 'prefer', 'preferwhy'
    ];
}
