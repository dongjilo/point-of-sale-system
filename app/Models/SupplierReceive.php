<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupplierReceive extends Model
{
    use HasFactory;

    function supplierOrder() : HasMany
    {
        return $this->hasMany(SupplierOrder::class);
    }

    function product() : HasMany
    {
        return $this->hasMany(Product::class);
    }

    function inventory() : BelongsToMany
    {
        return $this->belongsToMany(Inventory::class);
    }

}
