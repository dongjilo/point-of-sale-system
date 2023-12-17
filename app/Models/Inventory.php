<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inventory extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'inventory_id';

    function product() : BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    function supplier() : BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function orderItem() : HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

}
