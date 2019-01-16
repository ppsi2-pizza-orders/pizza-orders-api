<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Http\Resources\UserResource;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    public const ROLE_OWNER = 1;
    public const ROLE_MANAGER = 2;
    public const ROLE_CHIEF = 3;

    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id', 'is_admin'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        $userResource = new UserResource();
        return [
            'user' => $userResource->resource($this)->toArray()
        ];
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class)->withPivot('role');
    }
}
