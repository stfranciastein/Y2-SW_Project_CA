<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityReduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'activity_id',
        'reduction_food',
        'reduction_waste',
        'reduction_energy',
        'reduction_land',
        'reduction_air',
        'reduction_sea',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Activity model
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
