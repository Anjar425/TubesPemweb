<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class RegionalAdmin extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'regional_admins';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'administrator_id',
        'region_id',
        'name',
        'email',
        'password',
        'visible_password',
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

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }
}

