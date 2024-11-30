@extends('dashboard')
<!-- A dashboard layout-ra refferal -->

@section('content')
<section class="md:col-span-2 p-4">
    <div class="container mx-auto">
        <x-feedback />
        <h2 class="text-2xl font-semibold text-white mb-4">Add Admin</h2>
        <div class="bg-[rgb(36,48,63)] shadow rounded-lg p-6">
            <form action="{{ route('dashboard.storeadmin') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-white text-sm font-medium mb-2">Name</label>
                    <input type="text" id="name" name="name" class="w-full bg-[rgb(36,48,63)] text-white p-2 border-b border-gray-700 focus:border-b focus:border-blue-500 focus:outline-none" />
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-white text-sm font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full bg-[rgb(36,48,63)] text-white p-2 border-b border-gray-700 focus:border-b focus:border-blue-500 focus:outline-none" />
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-white text-sm font-medium mb-2">Password</label>
                    <input type="password" id="password" name="password" class="w-full bg-[rgb(36,48,63)] text-white p-2 border-b border-gray-700 focus:border-b focus:border-blue-500 focus:outline-none" />
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-white text-sm font-medium mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full bg-[rgb(36,48,63)] text-white p-2 border-b border-gray-700 focus:border-b focus:border-blue-500 focus:outline-none" />
                </div>

                <div class="flex gap-x-5">
                    <button type="submit" class="mt-4 px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Add Admin
                    </button>
                    <button type="reset" class="mt-4 px-6 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
