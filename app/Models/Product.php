<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'product_id';

    use HasFactory;


    function supplier() : BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    function category() : BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function inventory() : HasMany
    {
        return $this->hasMany(Inventory::class);
    }

    function orderItem() : HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    function supplierOrder() : HasMany
    {
        return $this->hasMany(SupplierOrder::class);
    }

    function supplierReceive() : HasMany
    {
        return $this->hasMany(SupplierReceive::class);
    }



}
