<div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
    <nav class="mt-5 py-4" x-data="{ selected: $persist('Dashboard') }">
        <div>
            <h3 class="mb-4 ml-7 text-lg font-medium text-bodydark2">MENU</h3>
            <ul class="mb-6 flex flex-col text-md cursor-pointer">
                <!-- Menu Item: Profile -->
                @php
                    $items = collect($sidebarName)->zip($routes);
                @endphp

                @foreach($items as [$item, $route])
                    <li>
                        <a
                            class="group relative flex items-center gap-2.5 rounded-sm py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 hover:p-4 no-underline"
                            href="{{ route($route) }}"
                        >
                            {{ $item }}
                        </a>
                    </li>
                @endforeach
                <li>
                    <a
                        class="group relative flex items-center gap-2.5 rounded-sm py-2 font-medium text-danger duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 hover:p-4 no-underline"
                        href="{{ route('logout') }}"
                        class="nav-link text-danger"
                        style="visibility: visible;"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    >
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
