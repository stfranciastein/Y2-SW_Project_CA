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

    //For testing purposes only.
    //This can let you do emission->user->name but this is impractical for anything other than testing purposes.
    public function user()
    {
    return $this->belongsTo(\App\Models\User::class);
    }
}