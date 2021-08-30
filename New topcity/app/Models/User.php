<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function legal_entities()
    {
        return $this->hasMany(LegalEntity::class);
    }

    public function delivery_addresses()
    {
        return $this->hasMany(DeliveryAddress::class);
    }

    public function specifications()
    {
        return $this->hasMany(Specification::class);
    }
}
