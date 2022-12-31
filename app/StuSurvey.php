<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StuSurvey extends Model
{
    use HasFactory;
    public $table = 'studentsurvey';
    protected $fillable = [
        'name', 'matricnumber', 'contact', 'email', 'yearcourse', 'company', 'compaddress', 'learn', 'prefer', 'preferwhy'
    ];
}
