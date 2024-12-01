@extends('dashboard')
<!-- A dashboard layout-ra refferal -->

@section('content')
<section class="md:col-span-2 p-4">
    <x-feedback />
    <h2 class="text-2xl font-semibold text-white mb-4">All Registerd Members</h2>    
    <div class="flex flex-col">
        <!-- Table Header -->
        <div class="grid grid-cols-4 lg:grid-cols-5 rounded-sm bg-gray-2 dark:bg-meta-4">
            <div class="p-2.5 xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">Profile</h5>
            </div>
            <div class="p-2.5 text-center xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">Full Name</h5>
            </div>
            <div class="p-2.5 hidden lg:block text-center xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">Email</h5>
            </div>
            <div class="p-2.5 text-center xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">Role</h5>
            </div>
            <div class="p-2.5 text-center xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">Actions</h5>
            </div>
        </div>
    
        <!-- Table Body -->
        @foreach ($users as $user)
            <div class="grid grid-cols-4 lg:grid-cols-5 border-b border-stroke dark:border-strokedark">
                <!-- Profile Picture -->
                <div class="flex items-center gap-3 p-2.5 xl:p-5">
                    <div class="flex-shrink-0">
                        <img src="{{ $user->profilePicturePath ? asset('storage/' . $user->profilePicturePath) : asset('images/default-avatar.png') }}" 
                             alt="{{ $user->username }}'s Profile Picture" 
                             class="w-12 h-12 rounded-full">
                    </div>
                </div>
    
                <div class="flex items-center justify-center p-2.5 xl:p-5 text-gray-500">
                    <p class="font-medium text-gray-500">{{ $user->name }}</p>
                </div>
    
                <!-- Email -->
                <div class="flex hidden lg:block items-center justify-center p-2.5 xl:p-5">
                    <p class="font-medium text-gray-500">{{ $user->email }}</p>
                </div>
    
                <!-- Role -->
                <div class="flex items-center justify-center p-2.5 xl:p-5">
                    <p class="font-medium text-white">{{ ucfirst($user->role) }}</p>
                </div>
    
                <!-- Actions -->
                <div class="flex items-center justify-center p-2.5 xl:p-5">
                    <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete {{$user->name}}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <x-svg.delete />
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>    
</section>
@endsection