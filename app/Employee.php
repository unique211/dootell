<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employee";
    protected $fillable = [
        'employee_name', 'doj', 'user_type', 'mobile', 'email', 'user_id', 'groups_id',
    ];
}