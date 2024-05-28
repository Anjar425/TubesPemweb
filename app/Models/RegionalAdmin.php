<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class RegionalAdmin extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'administrator_id',
        'regions_id',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function administrator()
    {
        return $this->belongsTo(Administrator::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}

