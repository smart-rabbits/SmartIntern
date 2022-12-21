<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SvSurvey extends Model
{
    use HasFactory;
    public $table = 'sv_survey';
    protected $fillable = ['svName', 'email', 'svCompany', 'svStu', 'rate', 'reason', 'comment'];
}
