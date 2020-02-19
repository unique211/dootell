<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package_list extends Model
{
    protected $table = "package_list_master";
    protected $fillable = [
        'package_title', 'package_type', 'package_validity', 'package_price', 'image', 'user_id', 'no_of_candidate','status', 'no_of_customer',
    ];
}
