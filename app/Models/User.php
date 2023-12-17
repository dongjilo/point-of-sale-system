<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable, Authorizable;

    protected $primaryKey = 'user_id';
    protected $guarded = [];

    protected $hidden = [
        'user_password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'user_password' => 'hashed',
    ];

    public function findForPassport($username) {
        return $this->where('user_uname', $username)->first();
    }

    public function role() : BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function hasRole($role) {
        return $this->role->role_name == $role;
    }

    public function getAuthPassword()
    {
        return $this->user_password;
    }

    function inventory() : HasMany
    {
        return $this->hasMany(Inventory::class);
    }

    function product() : HasMany
    {
        return $this->hasMany(Product::class);
    }

    function order() : HasMany
    {
        return $this->hasMany(Order::class);
    }

    function billing() : HasMany
    {
        return $this->hasMany(Billing::class);
    }
}
