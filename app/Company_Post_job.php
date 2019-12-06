<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_Post_job extends Model
{
    protected $table = "company_job_post";
    protected $fillable = [
        'post_date', 'job_title', 'description', 'keywords', 'experience_from', 'experience_to',  'ctc',  'from_ctc', 'to_ctc', 'vacancies', 'location', 'industry', 'qualification', 'email', 'venue', 'date_from', 'date_to',  'company_id', 'status'
    ];
}