<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory;

    function userType() : HasOne
    {
        return $this->hasOne(UserType::class);
    }

    function supplierOrder() : belongsToMany
    {
        return $this->belongsToMany(SupplierOrder::class);
    }

    function product() : belongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    function order() : belongsToMany
    {
        return $this->belongsToMany(Order::class);
    }


}
