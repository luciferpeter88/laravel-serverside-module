@extends('dashboard')
<!-- A dashboard layout-ra refferal -->

@section('content')
<section class="md:col-span-2 p-4">
    <h2 class="text-2xl font-semibold text-white mb-4">My Posts</h2>
    <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-4 flex flex-col gap-y-3">
        @if($myposts->isEmpty())
        <p class="text-gray-400">You have not created any posts yet.</p>
        @else
            @foreach ($myposts as $post)
                <x-post 
                    :title="$post->title" 
                    :category="$post->category->name" 
                    :user="$post->user->username" 
                    :createdAt="$post->created_at->format('d M Y')" 
                    :answers="$post->comments_count ?? 0"
                    :route="'/post/' . $post->id"
                />
            @endforeach
        @endif
    </div>
</section>
@endsection