@extends('dashboard')
<!-- A dashboard layout-ra refferal -->

@section('content')
<section class="md:col-span-2 p-4">
    <h2 class="text-2xl font-semibold text-white mb-4">My Posts</h2>
    <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-4 flex flex-col gap-y-3">
        @foreach ($questions as $question)
        <x-post :title="$question['title']" :category="$question['category']" :user="$question['user']" :createdAt="$question['created_at']" :answers="$question['answers']" />
        @endforeach
    </div>
</section>
@endsection