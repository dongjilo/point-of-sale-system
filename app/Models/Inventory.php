<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inventory extends Model
{
    use HasFactory;

    protected $primaryKey = 'inventory_id';

    function product() : BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    function supplierReceive() : BelongsToMany
    {
        return $this->belongsToMany(SupplierReceive::class);
    }

}
