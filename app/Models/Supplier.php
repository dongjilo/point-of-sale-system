<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Supplier extends Model
{
    use HasFactory;

    function supplierOrder() : BelongsToMany
    {
        return $this->belongsToMany(SupplierOrder::class);
    }

    function product() : BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
