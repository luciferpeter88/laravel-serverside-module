<div class="bg-boxdark-2 shadow rounded-lg px-4  flex flex-col h-40 justify-center">
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
    <p class="text-gray-400 mt-auto">Answers: {{ $answers }}</p>
</div>
