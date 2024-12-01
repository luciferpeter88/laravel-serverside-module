@extends('dashboard')
<!-- A dashboard layout-ra refferal -->

@section('content')
<section class="md:col-span-2 p-4">
    <h2 class="text-2xl font-semibold text-white mb-4">Add a category</h2>
    <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-6 grid grid-cols-1 gap-3 lg:grid-cols-2 xl:grid-cols-3">
        @foreach ($categories as $category)
        <x-category :name="$category['name']" :description="$category['description']" />
        @endforeach
    </div>
</section>
@endsection