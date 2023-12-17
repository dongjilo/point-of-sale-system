<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BestSeller extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'bestseller_id';
    protected $table = 'bestseller';

    function product() : BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
