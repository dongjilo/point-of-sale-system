<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inventory extends Model
{
    use HasFactory;

    function product() : HasMany
    {
        return $this->hasMany(Product::class);
    }

    function supplier_receive() : HasMany
    {
        return $this->hasMany(SupplierReceive::class);
    }

    function inventory() : BelongsToMany
    {
        return $this->belongsToMany(Inventory::class);
    }

}
