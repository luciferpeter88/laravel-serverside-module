<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-head-tag />
    <body class="dark text-bodydark bg-boxdark-2">
        <div
            x-data="{ 
         page: 'Laravel Q&A Platform', 
         loaded: true, 
         stickyMenu: false, 
         sidebarToggle: false, 
         scrollTop: false 
         }"
        >
            <!-- ===== Page Wrapper ===== -->
            <div class="flex h-screen overflow-hidden">
                <!-- ===== Preloader Start ===== -->
                {{-- @include('partials.preloader') --}}
                <!-- ===== Preloader End ===== -->
                <!-- ===== Sidebar Start ===== -->
                {{-- @include('partials.sidebar') --}}
                <!-- ===== Sidebar End ===== -->
                <aside
                    :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
                    class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-[rgb(36,48,63)] duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0"
                    @click.outside="sidebarToggle = false"
                >
                    <!-- SIDEBAR HEADER -->
                    <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
                        <button class="block lg:hidden" @click.stop="sidebarToggle = !sidebarToggle">
                            <svg class="fill-current" width="20" height="18" viewBox="0 0 20 18" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z"
                                    fill=""
                                />
                            </svg>
                        </button>
                        <a class="navbar-brand fw-bold text-white" href="{{ url('/') }}" style="font-size: 1.12rem;">Laravel Q&A Platform</a>
                    </div>
                    <!-- SIDEBAR HEADER -->
                    <!-- SIDEBAR MENU -->
                    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
                        <nav class="mt-5 py-4 " x-data="{ selected: $persist('Dashboard') }">
                            <div>
                                <h3 class="mb-4 ml-7 text-lg font-medium text-bodydark2">MENU</h3>
                                <ul class="mb-6 flex flex-col text-md cursor-pointer">
                                    <!-- Menu Item: Profile -->
                                    <li class="">
                                        <a
                                        class="group relative flex items-center gap-2.5 rounded-sm py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 hover:p-4 no-underline"
                                        {{--
                                            href="{{ route('profile') }}"
                                            --}}
                                        >
                                           
                                            Profile
                                        </a>
                                    </li>
                                    <!-- Menu Item: Tables -->
                                    <li>
                                        <a
                                        class="group relative flex items-center gap-2.5 rounded-sm py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 hover:p-4 no-underline"
                                            {{--
                                            href="{{ route('tables') }}"
                                            --}}
                                        
                                        >
                                            
                                           My Posts
                                        </a>
                                    </li>
                                    <!-- Menu Item: Settings -->
                                    <li>
                                        <a
                                        class="group relative flex items-center gap-2.5 rounded-sm py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 hover:p-4 no-underline"
                                            {{--
                                            href="{{ route('settings') }}"
                                            --}}
                                       
                                        >
                                            
                                            Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                        class="group relative flex items-center gap-2.5 rounded-sm py-2 font-medium text-danger duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 hover:p-4 no-underline"
                                        href="{{ route('logout') }}" class="nav-link text-danger" style="visibility: visible"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                         Logout
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- SIDEBAR MENU -->
                </aside>
                <!-- ===== Sidebar End ===== -->
                <!-- ===== Content Area Start ===== -->
                <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                    <!-- ===== Header Start ===== -->
                    {{-- @include('partials.header') --}}
                    <!-- ===== Header End ===== -->
                    <header class="sticky top-0 z-999 flex w-full bg-[rgb(36,48,63)] drop-shadow-1 dark:bg-boxdark dark:drop-shadow-none h-20">
                        <div class="flex flex-grow items-center justify-between px-4 py-4 shadow-2 md:px-6 2xl:px-11">
                            <!-- Mobile Hamburger Toggle Button -->
                            <div class="flex items-center gap-2 sm:gap-4 lg:hidden ml-auto">
                                <button class="z-99999 block rounded-sm border border-stroke bg-white p-1.5 shadow-sm dark:border-strokedark dark:bg-boxdark lg:hidden" @click.stop="sidebarToggle = !sidebarToggle">
                                    <!-- Icon for Hamburger -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </header>
                     <!-- ===== Header End ===== -->
                    <!-- ===== Main Content Start ===== -->
                    <main>
                        @yield('content')
                        <!-- Content specific to each page -->
                    </main>
                    <!-- ===== Main Content End ===== -->
                </div>
                <!-- ===== Content Area End ===== -->
            </div>
        </div>
    </body>
</html>
