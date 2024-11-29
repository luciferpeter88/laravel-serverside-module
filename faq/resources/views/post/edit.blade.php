@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-6">
        <h2 class="text-[1.5rem] font-bold text-white mb-4">Edit Comment</h2>

        <form action="{{ route('comment.update', $comment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <textarea 
                name="content" 
                class="w-full bg-[rgb(36,48,63)] text-white p-4 rounded-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                rows="4"
                required>{{ $comment->content }}</textarea>

            <button type="submit" class="mt-4 px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Save Changes
            </button>
        </form>
    </div>
</div>
@endsection
