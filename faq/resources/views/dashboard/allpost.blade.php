@extends('dashboard')
<!-- A dashboard layout-ra refferal -->

@section('content')
<section class="md:col-span-2 p-4">
    <h2 class="text-2xl font-semibold text-white mb-4">All Posts</h2>
    <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-4 flex flex-col gap-y-3">
        @if($posts->isEmpty())
        <p class="text-gray-400">There is no any posts yet.</p>
        @else
        <div class="grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
            @foreach ($posts as $post)
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
        @endif
    </div>
</section>
@endsection

