<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = "regions";

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'administrator_id',
        'name',
        'location',
        'area',
        'latitude',
        'longitude',
        'status',
    ];
    
    public function administrator()
    {
        return $this->belongsTo(Administrator::class);
    }

    public function regionalAdmins()
    {
        return $this->hasMany(RegionalAdmin::class);
    }
}

