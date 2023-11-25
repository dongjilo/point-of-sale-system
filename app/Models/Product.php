<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    function supplier() : HasOne
    {
        return $this->hasOne(Supplier::class);
    }

    function user() : HasOne
    {
        return $this->hasOne(User::class);
    }

    function inventory() : BelongsToMany
    {
        return $this->belongsToMany(Inventory::class);
    }

    function order() : BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    function supplierOrder() : BelongsToMany
    {
        return $this->belongsToMany(SupplierOrder::class);
    }

    function supplierReceive() : BelongsToMany
    {
        return $this->belongsToMany(SupplierReceive::class);
    }



}
