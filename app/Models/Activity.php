<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name', 'description', 'difficulty', 'impact_points', 'image_url',
        'reduction_food', 'reduction_waste', 'reduction_energy',
        'reduction_land', 'reduction_air', 'reduction_sea'
    ];
    
}
