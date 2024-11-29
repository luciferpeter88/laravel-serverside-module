@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <x-feedback />
    <!-- Post Title Section -->
    <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-6 relative">
        <div class="flex items-center justify-between"> 
            <h2 class="text-[1.5rem] font-bold text-white">{{ $post->title }}</h2>
            <p class="text-sm text-gray-400">Posted by <span class="text-white">{{ $post->user->username }}</span> on {{ $post->created_at->format('Y-m-d H:i') }}</p>
        </div>
        <div class="text-gray-300 leading-7 text-md">
            <h3 class="text-sm mt-4"> {{ $post->content }}</h3>
            <div class="h-12 w-12 rounded-full bg-boxdark-2  flex justify-center items-center text-white absolute right-2 bottom-2">{{ $post->comments->count() }} </div>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="mt-8">
        <div class="rounded-lg mt-4">
            @forelse ($post->comments as $comment)
                <div class="mb-4 bg-[rgb(36,48,63)] p-4">
                    <p class="text-sm text-gray-500">
                        {{ $comment->user->username }} - {{ $comment->created_at->format('Y-m-d H:i') }}
                    </p>
                    <p class="text-gray-200">{{ $comment->content }}</p>
                    @if (auth()->id() === $comment->user_id)
                    <div class="flex gap-x-2 mt-2 justify-end">
                        <a href="{{ route('comment.edit', $comment->id) }}" class="text-white no-underline bg-blue-500 px-3 py-1 rounded-md">Edit</a>
                        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white px-3 py-1 rounded-md bg-red-500">Delete</button>
                        </form>
                    </div>
                    @elseif(auth()->user()->role === 'admin' || auth()->user()->role === 'superadmin')
                    <div class="flex gap-x-2 mt-2 justify-end">
                        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white px-3 py-1 rounded-md bg-red-500">Delete</button>
                        </form>
                    </div>
                    @endif
                </div>
            @empty
                <p class="text-gray-500">No comments yet. Be the first to comment!</p>
            @endforelse
        </div>
    </div>

    <!-- Add Comment Section -->
    @auth
    @if(auth()->user()->role === 'user')
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
    @endif
    @else
        <div class="mt-6">
            <p class="text-gray-400">Please <a href="/login" class="text-blue-500 hover:underline">log in</a> to leave a comment.</p>
        </div>
    @endauth
</div>
@endsection
