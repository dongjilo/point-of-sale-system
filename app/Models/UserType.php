<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserType extends Model
{
    use HasFactory;

    function user() : belongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
