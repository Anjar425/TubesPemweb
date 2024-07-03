<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    use HasFactory;

    protected $table = "coordinates";

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'region_id',
        'latitude',
        'longitude',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
