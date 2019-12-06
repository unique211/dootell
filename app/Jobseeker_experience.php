<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobseeker_experience extends Model
{
    protected $table = "jobseeker_experience";
    protected $fillable = [
        'ref_id', 'role', 'company_name', 'months', 'years'
    ];
}