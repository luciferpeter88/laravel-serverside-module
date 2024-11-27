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
            <div class="flex h-screen overflow-hidden">
                <aside
                    :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
                    class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-[rgb(36,48,63)] duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0"
                    @click.outside="sidebarToggle = false"
                >
                    <x-dash-header1 />
                    @if (Auth::user()->role == 'admin')
                    <x-dash-sidebar :sidebarName="['All Post', 'Add Category', 'All Users']" :routes="['dashboard.allpost', 'dashboard.addcategory', 'dashboard.allusers']" />
                    @elseif (Auth::user()->role == 'user')
                    <x-dash-sidebar :sidebarName="['My Posts', 'Profile', 'Settings']" :routes="['dashboard.posts', 'dashboard.profile', 'dashboard.settings']" />
                    @else
                    <x-dash-sidebar :sidebarName="['All Members', 'Add Admin']" :routes="['dashboard.allaregisteredmembers', 'dashboard.addadmin']" />
                    @endif
                </aside>
                <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                    <x-dash-header2 />
                    <main>
                        @yield('content')
                     
                        <!-- A dahshboardnak az aloldalai ide kerulnek be -->
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
