<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    //Defines Belongs-To-Many Relationship with the User model.
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    
}
