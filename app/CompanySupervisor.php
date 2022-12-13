<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanySupervisor extends Model
{
    protected $table = 'com_sv';
    protected $fillable = [
        'id', 'user_id', 'IC', 'gender', 'contact', 'address', 'company_id', 'created_at', 'updated_at'
    ];
}
