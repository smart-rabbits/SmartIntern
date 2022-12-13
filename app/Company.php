<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $fillable = [
        'id', 'company_name', 'email', 'address', 'supervisor', 'created_at', 'updated_at'
    ];
}
