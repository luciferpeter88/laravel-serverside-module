<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryPageController extends Controller
{
    public function show($categoryName, $pagenum)
    {
        Log::info('CategoryPageController@show: category = ' . $categoryName . ', pagenum = ' . $pagenum);
        if (!is_numeric($pagenum) || $pagenum < 1) {
            abort(404, 'Invalid page number.');
        }
        $category = Category::where('name', $categoryName)->first();

        if (!$category) {
            abort(404, 'Category not found.');
        }
         // Count the total number of posts for this category
         $totalPosts = $category->posts()->count();
         $postsPerPage = 10;
         // Calculate the total number of pages
        $totalPages = ceil($totalPosts / $postsPerPage);
        if($totalPages == 0) {
            $totalPages = 1;
        } 
        if ($pagenum > $totalPages && $totalPages > 0) {
            abort(404, 'Page number out of range.');
        }
        $posts = $category->posts()
        ->orderBy('created_at', 'desc') // Sort posts, optional
        ->skip(($pagenum - 1) * $postsPerPage)
        ->take($postsPerPage)
        ->get();

        return view('post.showposts', [
            'category' => $category,
            'posts' => $posts,
            'currentPage' => $pagenum,
            'totalPages' => $totalPages,
        ]);
    }
}
