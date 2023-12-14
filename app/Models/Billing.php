<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Billing extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'billing_id';

    function order() : BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
