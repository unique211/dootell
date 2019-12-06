<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_Customer extends Model
{
    protected $table = "company_customer";
    protected $fillable = [
        'date', 'customer_name', 'amount', 'address', 'aadhar', 'narration',  'image',  'company_id', 'status'
    ];
}