<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $guarded = [
        'dues_member_id',
        'amount_paid',
        'payment_date',
    ];
     public function duesMember()
    {
        return $this->belongsTo(DuesMember::class);
    }
}
