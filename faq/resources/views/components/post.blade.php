<div class="bg-boxdark-2 shadow rounded-lg px-4  flex flex-col h-40 justify-center relative">
    <!-- Post Title -->
    <a href={{$route}} class="text-lg font-bold text-blue-500 no-underline hover:underline mt-auto pt-2">
        {{ $title }}
    </a>

    <!-- Post Details -->
    <p class="text-gray-300 text-sm mt-auto">
        Category: <span class="font-semibold">{{ $category }}</span> | 
        Created: {{ $user }} | 
        {{ $createdAt }}
    </p>

    <!-- Answer Count -->
    <div class="flex justify-between"> 
        <p class="text-gray-400 mt-auto">Answers: {{ $answers }}</p>
        @Auth
        <form action="{{ route('post.destroy', $id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the {{$title}} post?');">
            @csrf
            @method('DELETE')
            @if (Auth::user()->role == 'superadmin')
            <button class="bg-red-500 text-gray-400 rounded-full w-7 h-7 absolute bottom-3 right-3" type="submit" >X</button>
            @endif
        </form>
        @endauth
    </div>
   
</div>
