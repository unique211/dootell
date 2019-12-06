<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = "transaction_master";
    protected $fillable = [
        'ref_id', 'role', 'transaction_id', 'payment_for', 'status', 'order_id', 'amount'
    ];
}