<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head-tag title="Welcome"/>
    <body class="bg-gray-100">
        <header class="bg-white shadow">
            <div class="container mx-auto px-4 py-3 flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-700">Laravel Q&A Platform</h1>
                <nav class="space-x-4">
                    @if(auth()->check())
                        <!-- Bejelentkezett felhasználók -->
                        <a href="{{ route('questions.create') }}" class="text-gray-700 hover:text-gray-900">Új kérdés</a>
                        <a href="{{ route('profile.show', auth()->user()->id) }}" class="text-gray-700 hover:text-gray-900">Profil</a>
                        <a href="{{ route('logout') }}" class="text-red-500 hover:text-red-700"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Kijelentkezés</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @else
                        <!-- Nem bejelentkezett felhasználók -->
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Login</a>
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900">Register</a>
                    @endif
                </nav>
            </div>
        </header>
        
        <main class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Latest Questions -->
                <section class="md:col-span-2">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Friss kérdések</h2>
                    <div class="bg-white shadow rounded-lg p-6">
                        {{-- @foreach ($questions as $question)
                            <div class="mb-4">
                                <a href="{{ route('questions.show', $question->id) }}" class="text-lg font-bold text-blue-500 hover:underline">
                                    {{ $question->title }}
                                </a>
                                <p class="text-gray-600 text-sm">
                                    Kategória: <span class="font-semibold">{{ $question->category->name }}</span> | Létrehozta: {{ $question->user->name }} | {{ $question->created_at->diffForHumans() }}
                                </p>
                                <p class="text-gray-700">Válaszok: {{ $question->answers->count() }}</p>
                            </div>
                            <hr class="my-4">
                        @endforeach --}}
                    </div>
                </section>
    
                <!-- Sidebar -->
                <aside>
                    <!-- Categories -->
                    <section class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Kategóriák</h3>
                        <div class="bg-white shadow rounded-lg p-6">
                            {{-- @foreach ($categories as $category)
                                <a href="{{ route('categories.show', $category->id) }}" class="block text-blue-500 hover:underline mb-2">
                                    {{ $category->name }}
                                </a>
                            @endforeach --}}
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
        </main>
        </body>
</html>
