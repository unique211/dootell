<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = "testimonials_master";
    protected $fillable = [
        'title', 'description', 'image', 'user_id'
    ];
}