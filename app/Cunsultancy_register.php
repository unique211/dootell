<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cunsultancy_register extends Model
{
    protected $table = "consultancy_register";
    protected $fillable = [
        'date', 'cunsultancy_name', 'package_id', 'mobile', 'cunsultancy_address', 'city',  'reference',  'upload_image',
    ];
}