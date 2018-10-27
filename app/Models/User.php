<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
