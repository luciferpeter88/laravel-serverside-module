@extends('layouts.app')
@section('content')
<div class="container mx-auto">
    <div class="flex flex-row justify-between">
        <h2 class="text-[1.25rem] font-bold text-white">Category  <span class="text-[1.25rem] font-bold text-gray-400">{{$category->name}}</span></h2>
        <h4 class="text-[1rem]">Page: {{ $currentPage }} of <span class="text-white">{{ $totalPages }}</span></h4> 
    </div>
    <div class="flex flex-col justify-between  mt-4">
            <section class="grid grid-cols-1 xl:grid-cols-2 gap-3">
                @foreach ($posts as $post)
               
                    <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-4 flex flex-col gap-y-3">
                        <x-post 
                            :title="$post->title" 
                            :category="$category->name" 
                            :user="$post->user->username" 
                            :createdAt="$post->created_at->format('Y-m-d H:i')" 
                            :answers="$post->comments_count" 
                            :route="'/post/' . $post->id"
                            :id="$post->id"
                        />
                        </a>
                    </div>
                    @endforeach
            </section>
            
            <!-- Pagination Links -->
            <div class="flex justify-center mt-8 gap-x-2">
                @if ($currentPage > 1)
                    <a href="/posts/{{ $category->name }}/{{ $currentPage - 1 }}" class="px-4 py-2 bg-gray-700 text-white rounded">Previous</a>
                @endif
            
                @for ($i = 1; $i <= $totalPages; $i++)
                    <a href="/posts/{{ $category->name }}/{{ $i }}" class="px-4 py-2 {{ $i == $currentPage ? 'bg-blue-500' : 'bg-gray-700' }} text-white rounded">
                        {{ $i }}
                    </a>
                @endfor
            
                @if ($currentPage < $totalPages)
                    <a href="/posts/{{ $category->name }}/{{ $currentPage + 1 }}" class="px-4 py-2 bg-gray-700 text-white rounded">Next</a>
                @endif
            </div>
    </div>
</div>
@endsection