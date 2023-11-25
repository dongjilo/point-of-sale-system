<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Billing extends Model
{
    use HasFactory;

    function order() : hasOne
    {
        return $this->hasOne(Order::class);
    }

    function user() : hasOne
    {
        return $this->hasOne(User::class);
    }

}
