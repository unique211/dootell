<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_emp_experience extends Model
{
    protected $table = "company_employee_experience";
    protected $fillable = [
        'emp_id', 'designation', 'doj', 'leave_date', 'company_id'
    ];
}