<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'order_id';

    function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function orderItems() : HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    function billing() : HasOne
    {
        return $this->hasOne(Billing::class);
    }

}
