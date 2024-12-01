@extends('dashboard')
<!-- A dashboard layout-ra refferal -->

@section('content')
<section class="md:col-span-2 p-4">
    <h2 class="text-2xl font-semibold text-white mb-4">Create a New Post</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
            </div>
        @endif
    <div class="bg-[rgb(36,48,63)] shadow rounded-lg px-6 py-4 flex flex-col">
        <!-- Form -->
        <form action="{{ route('dashboard.storepost') }}" method="POST" class="flex flex-col space-y-4">
            @csrf
            <!-- Post Title -->
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-300 mb-2">Title</label>
                <input type="text" name="title" id="title" placeholder="Enter the post title" class="w-full rounded  bg-gray py-3 pl-5 pr-4.5 font-medium  focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 text-white dark:focus:border-primary" />
            </div>
    
            <!-- Post Content -->
            <div>
                <label for="content" class="block text-sm font-semibold text-gray-300 mb-2">Content</label>
                <textarea name="content" id="content" rows="5" placeholder="Write your post content"
                class="w-full rounded  bg-gray py-3 pl-5 pr-4.5 font-medium  focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 text-white dark:focus:border-primary"></textarea>
            </div>
    
            <!-- Post Category -->
            <div>
                <label for="category" class="block text-sm font-semibold text-gray-300 mb-2">Category</label>
                <select name="category_id" id="category"
                    class="w-full px-4 py-2 bg-boxdark rounded-lg text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected >Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class="bg-white p-5">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <!-- Submit Button -->
            <div class="text-right">
                <button type="submit"
                    class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Submit Post
                </button>
            </div>
        </form>
    </div>    
</section>
@endsection