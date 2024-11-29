@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <!-- Post Title Section -->
    <div class="flex flex-row justify-between mb-6">
        <h2 class="text-[1.5rem] font-bold text-white">{{ $post->title }}</h2>
        <p class="text-sm text-gray-400">Posted by <span class="text-white">{{ $post->user->username }}</span> on {{ $post->created_at->format('Y-m-d H:i') }}</p>
    </div>

    <!-- Post Content -->
    <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-6">
        <div class="text-gray-300 leading-7">
            {{ $post->content }}
        </div>
    </div>

    <!-- Comments Section -->
    <div class="mt-8">
        <h3 class="text-[1.25rem] font-bold text-white">Comments ({{ $post->comments->count() }})</h3>
        <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-6 mt-4">
            @forelse ($post->comments as $comment)
                <div class="mb-6 border-b border-gray-600 pb-4">
                    <p class="text-sm text-gray-400">
                        <span class="text-white">{{ $comment->user->name }}</span> - {{ $comment->created_at->format('Y-m-d H:i') }}
                    </p>
                    <p class="text-gray-300 mt-2">{{ $comment->content }}</p>
                </div>
            @empty
                <p class="text-gray-400">No comments yet. Be the first to comment!</p>
            @endforelse
        </div>
    </div>

    <!-- Add Comment Section -->
    @auth
        <div class="mt-6">
            <h4 class="text-[1rem] font-bold text-white">Add a Comment</h4>
            <form action="/post/{{ $post->id }}/comment" method="POST" class="mt-4">
                @csrf
                <textarea name="content" class="w-full bg-[rgb(36,48,63)] text-white p-4 rounded-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Write your comment here..."></textarea>
                <button type="submit" class="mt-4 px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Submit Comment
                </button>
            </form>
        </div>
    @else
        <div class="mt-6">
            <p class="text-gray-400">Please <a href="/login" class="text-blue-500 hover:underline">log in</a> to leave a comment.</p>
        </div>
    @endauth
</div>
@endsection
