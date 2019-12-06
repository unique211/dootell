<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = "posts";
    protected $fillable = [
        'date', 'group_id', 'title', 'description', 'image', 'user_id'
    ];
}