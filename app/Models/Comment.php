<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'blog_post_id', 'content'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class);
    }
}
