<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Add this line
        'baseline_food',
        'baseline_waste',
        'baseline_energy',
        'baseline_land',
        'baseline_air',
        'baseline_sea',
    ];
}