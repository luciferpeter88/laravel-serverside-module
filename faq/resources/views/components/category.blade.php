<div class="bg-boxdark-2 shadow rounded-lg p-6">
    <!-- Category Name -->
    <h3 class="text-lg font-bold text-blue-500">
        {{-- category.show --}}
        <a href="{{ route('category.show', ['category' => strtolower($name), 'pagenum' => 1]) }}" class="no-underline">
            {{ $name }}
        </a>        
        {{-- <a href="posts/{{strtolower($name)}}/1" class="no-underline">
            {{ $name }}
        </a> --}}
    </h3>

    <!-- Category Description -->
    <p class="text-gray-400 text-sm">{{ $description }}</p>
</div>
