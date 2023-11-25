<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    function product() : HasMany
    {
        return $this->hasMany(Product::class);
    }

    function inventory() : HasMany
    {
        return $this->hasMany(Inventory::class);
    }

    function user() : HasOne
    {
        return $this->hasOne(User::class);
    }

    function billing() : BelongsTo
    {
        return $this->belongsTo(Billing::class);
    }



}
