<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;

    // Specify the table name (optional, defaults to plural of model name)
    protected $table = 'categories';

    // Mass-assignable attributes
    protected $fillable = ['name', 'description'];

    // Define relationships
    public function posts()
    {  // in the categories table the id column is the primary key that references the category_id column in the posts table like this:
        // $table->id();
        return $this->hasMany(Post::class);
    }
}
