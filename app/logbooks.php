<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logbooks extends Model
{
    protected $table = 'logbooks';
    protected $fillable = [
        'id', 'type', 'student_id', 'marks_sv', 'marks_company', 'total_marks', 'document', 'notes', 'created_at', 'created_by', 'updated_at', 'updated_by'
    ];
}
