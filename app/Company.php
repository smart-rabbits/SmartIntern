<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $fillable = [
        'id', 'company_name', 'company_email', 'company_address','company_department','created_at', 'updated_at' 
    ];
}
