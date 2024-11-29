<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'user_id', 'content'];

    // Relationship with Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}
