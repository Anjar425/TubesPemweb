<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantRegion extends Model
{
    use HasFactory;
    protected $table = 'plant_regions';

    protected $fillable = [
        'region_id',
        'plant_id',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
