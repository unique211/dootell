<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribed_Groups extends Model
{
    protected $table = "subscribed_groups";
    protected $fillable = [
        'group_id', 'amount', 'subscriber_id',
    ];
}