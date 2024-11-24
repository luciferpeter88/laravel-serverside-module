@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <section class="md:col-span-2">
            <h2 class="text-2xl font-semibold text-white mb-4">New Questions</h2>
            <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-4 flex flex-col gap-y-3">
                @foreach ($questions as $question)
                <x-post :title="$question['title']" :category="$question['category']" :user="$question['user']" :createdAt="$question['created_at']" :answers="$question['answers']" />
                @endforeach
            </div>
        </section>

        <!-- Sidebar -->
        <aside>
            <!-- Categories -->
            <section class="mb-8">
                <h3 class="text-xl font-semibold text-white mb-4">Kategóriák</h3>
                <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-6 flex flex-col gap-y-2 ">
                    @foreach ($categories as $category)
                    <x-category :name="$category['name']" :description="$category['description']" />
                @endforeach
                </div>
            </section>

            <!-- Search -->
            <section>
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Keresés</h3>
                {{-- action="{{ route('questions.search') }}"  --}}
                <form method="GET" class="bg-white shadow rounded-lg p-6">
                    <input 
                        type="text" 
                        name="query" 
                        placeholder="Keresés kérdések között..." 
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    >
                    <button type="submit" class="mt-4 w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                        Keresés
                    </button>
                </form>
            </section>
        </aside>

    </div>
</div>
@endsection