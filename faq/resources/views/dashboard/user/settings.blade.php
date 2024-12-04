@extends('dashboard') <!-- A dashboard layout-ra refferal -->

@section('content')
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="mx-auto max-w-242.5">
            <!-- Breadcrumb Start -->
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-title-md2 font-bold text-white">
                    Settings Page
                </h2>
            </div>
            <!-- Breadcrumb End -->

            <!-- ====== Settings Section Start -->
            <div class="grid grid-cols-5 gap-8">
                <div class="col-span-5 xl:col-span-3">
                    <div class="rounded-sm  bg-[rgb(36,48,63)] shadow-default dark:border-strokedark dark:bg-boxdark">
                        <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                            <h3 class="font-medium text-white">
                                Personal Information
                            </h3>
                            <x-feedback />
                        </div>
                        <div class="p-7">
                            <form action="{{ route('dashboard.settings.update') }}" method="POST">
                                @csrf 
                                <div class="mb-5.5">
                                    <div class="w-full">
                                        <label class="mb-3 block text-sm font-medium text-white" for="name">Full Name</label>
                                        <div class="relative">
                                            <x-svg-profile />
                                            <input
                                                class="w-full rounded  bg-gray py-3 pl-11.5 pr-4.5 font-medium  focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 text-white dark:focus:border-primary"
                                                type="text"
                                                name="name"
                                                id="name"
                                                placeholder="Devid Jhon"
                                                value="{{ old('name', $user->name) }}"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-white" for="emailAddress">Email Address</label>
                                    <div class="relative">
                                        <x-svg-email />
                                        <input
                                            class="w-full rounded  bg-gray py-3 pl-11.5 pr-4.5 font-medium focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 text-white dark:focus:border-primary"
                                            type="email"
                                            name="emailAddress"
                                            id="emailAddress"
                                            placeholder="devidjond45@gmail.com"
                                            value="{{ old('email', $user->email) }}"
                                            readonly
                                        />
                                    </div>
                                </div>

                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium text-white" for="username">Username</label>
                                    <input
                                        class="w-full rounded  bg-gray px-4.5 py-3 font-medium  focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 text-white dark:focus:border-primary"
                                        type="text"
                                        name="username"
                                        id="username"
                                        placeholder="devidjhon24"
                                        value="{{ old('username', $user->username) }}"                                    />
                                </div>

                                <div class="mb-5.5">
                                    <label class="mb-3 block text-sm font-medium  text-white" for="bio">BIO</label>
                                    <div class="relative">
                                        <x-svg-bio />
                                        <textarea
                                            class="w-full rounded  bg-gray py-3 pl-11.5 pr-4.5 font-medium  focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 text-white dark:focus:border-primary"
                                            name="bio"
                                            id="bio"
                                            rows="6"
                                            placeholder="Write your bio here"
                                        >{{ old('bio', $user->bio) }}</textarea>
                                    </div>
                                </div>

                                <div class="flex justify-end gap-4.5">
                                    <button class="flex justify-center rounded border border-stroke px-6 py-2 font-medium  hover:shadow-1 dark:border-strokedark dark:text-white" type="reset">
                                        Cancel
                                    </button>
                                    <button class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90" type="submit">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-span-5 xl:col-span-2">
                    <div class="rounded-sm  border-stroke  shadow-default dark:border-strokedark dark:bg-boxdark">
                        <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                            <h3 class="font-medium  dark:text-white">
                                Your Photo
                            </h3>
                        </div>
                        <div class="p-7">
                            <form action="{{route('dashboard.settings.profilepicture')}}" method="POST" enctype="multipart/form-data">
                                @csrf 
                                <div class="mb-4 flex items-center gap-3">
                                    <div class="h-34 w-34 rounded-full">
                                        <img 
                                        src="{{ $user->profilePicturePath 
                                                ? asset('storage/' . $user->profilePicturePath) 
                                                : asset('storage/default/default-background.png') }}" 
                                        alt="User" />
                                    </div>
                                    <div>
                                        <span class="mb-1.5 font-medium  dark:text-white">Edit your photo</span>
                                    </div>
                                </div>

                                <div id="FileUpload" class="relative mb-5.5 block w-full cursor-pointer appearance-none rounded border border-dashed border-primary bg-gray px-4 py-4 dark:bg-meta-4 sm:py-7.5">
                                    <input type="file" accept="image/*" class="absolute inset-0 z-50 m-0 h-full w-full cursor-pointer p-0 opacity-0 outline-none" name="profilePicturePath" />
                                    <div class="flex flex-col items-center justify-center space-y-3">
                                        <x-svg-upload />
                                        <p class="text-sm font-medium">
                                            <span class="text-primary">Click to upload</span>
                                        </p>
                                        <p class="mt-1.5 text-sm font-medium">
                                            SVG, PNG, JPG or GIF
                                        </p>
                                        <p class="text-sm font-medium">
                                            (max, 800 X 800px)
                                        </p>
                                    </div>
                                </div>

                                <div class="flex justify-end gap-4.5">
                                    <button class="flex justify-center rounded border border-stroke px-6 py-2 font-medium  hover:shadow-1 dark:border-strokedark dark:text-white" type="reset" >
                                        Cancel
                                    </button>
                                    <button class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90" type="submit">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ====== Settings Section End -->
        </div>
    </div>
</main>
@endsection