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

    protected $guarded = [];
    protected $primaryKey = 'supplier_receive_id';

    function supplierOrder() : BelongsTo
    {
        return $this->belongsTo(SupplierOrder::class, 'supplier_order_id');
    }

    function product() : BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_id');
    }
    function inventory() : HasMany
    {
        return $this->hasMany(Inventory::class);
    }
}
