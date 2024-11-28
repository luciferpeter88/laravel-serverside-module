<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // Specify the table name (optional, defaults to plural of model name)
    protected $table = 'posts';

    // Mass-assignable attributes
    protected $fillable = ['title', 'content', 'user_id', 'category_id'];

    // Define relationships
    public function user()
    {   // in the post table the user_id column is the foreign key that references the id column in the users table like this:
        // $table->foreignId('user_id')->constrained()->onDelete('cascade');
        // in sql would look like this:
        // ALTER TABLE posts ADD CONSTRAINT posts_user_id_foreign FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE;
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        // in the post table the category_id column is the foreign key that references the id column in the categories table like this:
        return $this->belongsTo(Category::class);
    }
}
