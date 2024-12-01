@extends('dashboard')
<!-- A dashboard layout-ra refferal -->

@section('content')
<section class="md:col-span-2 p-4">
    <div class="container mx-auto">
        <x-feedback />
        <h2 class="text-2xl font-semibold text-white mb-4">Add Category</h2>
        <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-6 mb-5">
            <form action="{{ route('dashboard.storecategory') }}" method="POST">
                @csrf
                <!-- Title Field -->
                <div class="mb-4">
                    <label for="name" class="block text-white text-sm font-medium mb-2">Title</label>
                    <input type="text" id="name" name="name" class="w-full bg-[rgb(36,48,63)] text-white p-2 border-b border-gray-700 focus:border-b focus:border-blue-500 focus:outline-none">
                </div>

                <!-- Description Field -->
                <div class="mb-4">
                    <label for="description" class="block text-white text-sm font-medium mb-2">Description</label>
                    <textarea id="description" name="description" rows="2" class="w-full bg-[rgb(36,48,63)] text-white p-2 border-b border-gray-700 focus:border-b focus:border-blue-500 focus:outline-none"></textarea>
                </div>

                <!-- Submit and Reset Buttons -->
                <div class="flex gap-x-5">
                    <button type="submit" class="mt-4 px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Add Category
                    </button>
                    <button type="reset" class="mt-4 px-6 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
        <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-6 grid grid-cols-1 gap-3 lg:grid-cols-2 xl:grid-cols-3">
            @foreach ($categories as $category)
            <x-category :name="$category['name']" :description="$category['description']" />
            @endforeach
        </div>
    </div>
</section>
@endsection