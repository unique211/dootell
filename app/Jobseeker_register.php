<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobseeker_register extends Model
{
    protected $table = "jobseeker_register";
    protected $fillable = [
        'date', 'full_name', 'mobile', 'education', 'course', 'specialization', 'skill', 'board', 'institution', 'passing_year', 'marks', 'experience', 'dob', 'gender', 'address', 'hometown', 'pincode', 'state', 'aadhar', 'pan', 'reference', 'profile_photo', 'resume_doc', 'package_id',
        'email', 'applied_by', 'consultancy_id', 'int_job_location',
    ];
}