<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'supplier_id';

    function product() : HasMany
    {
        return $this->hasMany(Product::class);
    }

    function supplierOrder() : HasMany
    {
        return $this->hasMany(SupplierOrder::class);
    }

}
