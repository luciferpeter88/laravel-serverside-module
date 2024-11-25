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