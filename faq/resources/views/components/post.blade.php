<div class="bg-boxdark-2 shadow rounded-lg px-4  flex flex-col h-40 justify-center">
    <!-- Post Title -->
    <a href="#" class="text-lg font-bold text-blue-500 no-underline hover:underline mt-auto pt-2">
        {{ $title }}
    </a>

    <!-- Post Details -->
    <p class="text-gray-300 text-sm mt-auto">
        Kategória: <span class="font-semibold">{{ $category }}</span> | 
        Létrehozta: {{ $user }} | 
        {{ $createdAt }}
    </p>

    <!-- Answer Count -->
    <p class="text-gray-400 mt-auto">Válaszok: {{ $answers }}</p>
</div>
