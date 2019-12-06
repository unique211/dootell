<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login_master extends Model
{
    protected $table = "login_master";
    protected $fillable = [
        'ref_id', 'role', 'email', 'password', 'expire_date'
    ];
}