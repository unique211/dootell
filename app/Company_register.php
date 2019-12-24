<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_register extends Model
{
    protected $table = "company_register";
    protected $fillable = [
        'date', 'contact_person', 'package_id', 'mobile', 'company_name', 'company_address',  'city',  'reference', 'industry_type', 'logo','payment_status'
    ];
}
