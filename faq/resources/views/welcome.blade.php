@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <section class="md:col-span-2">
            <h2 class="text-2xl font-semibold text-white mb-4">Most Recent Posts</h2>
            <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-4 flex flex-col gap-y-3">
                @foreach ($recentPosts as $post)
                <x-post 
                :title="$post->title" 
                :category="$post->category->name" 
                :user="$post->user->username" 
                :createdAt="$post->created_at->format('d M Y')" 
                :answers="$post->comments_count ?? 0"
                :route="'/post/' . $post->id"
                :id="$post->id"
                />
                @endforeach
            </div>
        </section>

        <!-- Sidebar -->
        <aside>
            <!-- Categories -->
            <section class="mb-8">
                <h3 class="text-xl font-semibold text-white mb-4">Categories</h3>
                <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-6 flex flex-col gap-y-2 ">
                    @foreach ($categories as $category)
                    @php
                    // Calculate page number based on the number of posts
                    $pageNumber = $category->posts_count > 0 ? ceil($category->posts_count / 10) : 1;
                    @endphp
                    <x-category :name="$category['name']" :description="$category['description']" :pageNumber="$pageNumber" />
                    @endforeach
                </div>
            </section>
        </aside>

    </div>
</div>
@endsection