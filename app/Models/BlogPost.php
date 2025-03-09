<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = ['user_id', 'title', 'excerpt', 'content', 'image', 'published_at'];
    protected $dates = ['published_at']; 

    protected $casts = [
        'published_at' => 'datetime',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
