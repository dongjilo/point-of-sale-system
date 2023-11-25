<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SupplierOrder extends Model
{
    use HasFactory;

    function product() : HasMany
    {
        return $this->hasMany(Product::class);
    }
    function supplier() : HasOne
    {
        return $this->hasOne(Supplier::class);
    }

    function user() : HasOne
    {
        return $this->hasOne(User::class);
    }

    function supplierReceive() : BelongsToMany
    {
        return $this->belongsToMany(SupplierReceive::class);
    }

}
