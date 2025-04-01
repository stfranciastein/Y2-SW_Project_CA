<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'content',
        'category',
        'image_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
