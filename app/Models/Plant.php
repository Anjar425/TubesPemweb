<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $table = "plants";

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'regional_admins_id',
        'name',
        'leaf_width',
        'image',
        'type',
        'height',
        'diameter',
        'leaf_color',
        'watering_frequency',
        'light_intensity',
    ];

    public function regionalAdmin()
    {
        return $this->belongsTo(RegionalAdmin::class);
    }

    public function plantClass()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function regions()
    {
        return $this->belongsToMany(Region::class, 'plant_region');
    }
}
