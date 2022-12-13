<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $fillable = [
        'id', 'user_id', 'IC', 'staffID', 'gender', 'contact', 'address', 'created_at'
    ];
}
