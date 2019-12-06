<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = "slider_master";
    protected $fillable = [
        'image', 'user_id'
    ];
}