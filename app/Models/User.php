<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'country',
        'biography',
        'image_url',
        'level',
        'role',
        'onboarded'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

///////////////////////////////////////////////////////////////////////////////////////////////
    //Defines One-To-Many relationship with UserEmission model.
    public function userEmissions()
    {
    return $this->hasMany(\App\Models\UserEmission::class);
    }

    //Defines Belongs-To-Many relationship with FavouritedActivities model.
    public function favouritedActivities()
    {
    return $this->belongsToMany(Activity::class, 'favourited_activities')->withTimestamps();
    }

    //Defines Belongs-To-Many relationship with CompletedActivities model.
    public function completedActivities()
    {
    return $this->belongsToMany(Activity::class, 'completed_activities')->withTimestamps();
    }


}
