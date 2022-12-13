<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultySupervisor extends Model
{
    protected $table = 'fac_sv';
    protected $fillable = [
        'id', 'user_id', 'IC', 'staffID', 'gender', 'contact', 'address', 'created_at', 'updated_at'
    ];
}
