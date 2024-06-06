<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $primaryKey = 'id';

    // Define the fillable properties to allow mass assignment
    protected $fillable = [
        'regional_admins_id',
        'name',
    ];

    /**
     * Get the regional admin that owns the class.
     */
    public function regionalAdmin()
    {
        return $this->belongsTo(RegionalAdmin::class);
    }

    public function plants()
    {
        return $this->hasMany(Plant::class, 'class_id');
    }
}
