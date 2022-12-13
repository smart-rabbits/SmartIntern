<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'student';
    protected $fillable = [
        'id', 'user_id', 'IC', 'matricNum', 'gender', 'contact', 'address', 'status', 'company_id', 'created_at', 'updated_at'
    ];
}
