@extends('dashboard')
<!-- A dashboard layout-ra refferal -->

@section('content')
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="mx-auto max-w-242.5">
            <!-- Breadcrumb Start -->
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-title-md2 font-bold text-white dark:text-white">
                    Profile
                </h2>
            </div>
            <!-- Breadcrumb End -->

            <!-- ====== Profile Section Start -->
            <div class="overflow-hidden rounded-sm bg-[rgb(36,48,63)] shadow-default">
               <x-feedback />
                <div class="relative z-20 h-35 md:h-65">
                    <img src="{{ $user->backgroundPicturePath 
                    ? asset('storage/' . $user->backgroundPicturePath) 
                    : asset('images/default-profile.png') }}" alt="profile cover" class="h-full w-full rounded-tl-sm rounded-tr-sm object-cover object-center" />
                    <div class="absolute bottom-1 right-1 z-10 xsm:bottom-4 xsm:right-4">
                     <x-svg.edit />
                    </div>
                </div>
                <div class="px-4 pb-6 text-center lg:pb-8 xl:pb-11.5">
                    <div class="relative z-30 mx-auto -mt-22 h-30 w-full max-w-30 rounded-full bg-white/20 p-1 backdrop-blur sm:h-44 sm:max-w-44 sm:p-3">
                            <img
                            class="h-full w-full object-cover rounded-full" 
                            src="{{ $user->profilePicturePath 
                                    ? asset('storage/' . $user->profilePicturePath) 
                                    : asset('images/default-profile.png') }}" 
                            alt="User" />
                    </div>
                    <div class="mt-4">
                        <h3 class="mb-1.5 text-2xl font-medium text-white">
                           {{$user->name}}
                        </h3>
                        <div class="mx-auto mb-5.5 mt-4.5 rounded-md w-26 border-none py-2.5 shadow-1 dark:border-strokedark dark:bg-[#37404F]">
                            <div class="flex flex-col items-center justify-center gap-x-2 xsm:flex-row">
                             {{-- count the number of posts --}}
                                <span class="font-semibold text-white">{{$postCount}}</span>
                                <span class="text-sm">Posts</span>
                            </div>
                        </div>
                        <div class="mx-auto max-w-180">
                            <h4 class="font-medium text-white">
                                About Me
                            </h4>
                            <p class="mt-4.5 text-sm font-normal text-gray-400">
                                {{$user->bio}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ====== Profile Section End -->
        </div>
    </div>
</main>
@endsection
