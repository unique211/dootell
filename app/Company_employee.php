<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_employee extends Model
{
    protected $table = "company_employee";
    protected $fillable = [
        'full_name', 'gender', 'education', 'designation', 'experience', 'doj',  'leave_date',  'experience_certificate', 'notice_period',
        'notice_month', 'reason', 'profile_picture', 'aadhar',
        'behaviour', 'attendence', 'sincetity', 'dependability', 'company_id', 'status'
    ];
}