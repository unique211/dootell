<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $table = "groups";
    protected $fillable = [
        'group_name', 'amount', 'user_id', 'subject', 'image',
    ];
}