<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber_register extends Model
{
    protected $table = "subscriber_register";
    protected $fillable = [
        'date', 'name', 'mobile', 'address', 'aadhar',
    ];
}