<nav id="navbar" class="sticky left-0 top-0 z-50 w-full border-b border-gray-200 bg-white shadow-lg">
    <div class="container mx-auto flex flex-wrap items-center justify-between px-4 py-2">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ Storage::url($settings['main_logo']) }}" class="h-[85px] w-[85px] object-contain"
                alt="Logo" />
        </a>
        <div class="flex items-center space-x-3 rtl:space-x-reverse md:order-2 md:space-x-0">
            @guest
                <a href="/login"
                    class="text-md hidden w-full justify-center rounded-md bg-[#f00c93] px-6 py-2 font-bold leading-6 text-white shadow-sm hover:bg-[#ed6fb7] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 md:flex">{{ $settings['navbar_login_button'] }}</a>
            @endguest
            @auth
                <div class="relative flex rounded-full bg-gray-800 text-sm hover:cursor-pointer focus:ring-4 focus:ring-gray-300  md:me-0"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <img class="h-8 w-8 rounded-full" src="{{ asset('assets/images/noavatar.png') }}" alt="user photo">
                    <!-- Dropdown menu -->
                    <div class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded-lg bg-white text-base shadow "
                        id="user-dropdown">
                        <div class="px-4 py-4">
                            <span class="block text-sm text-gray-900 ">Hello,
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} !</span>
                            <span
                                class="block truncate text-sm text-gray-500 ">{{ Auth::user()->email }}</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li class="mb-2">
                                <a href="{{ route('dashboard') }}"
                                    class="{{ Route::currentRouteName() == 'dashboard' ? 'bg-[#f00c93] text-white' : '' }} block px-4 py-2 text-sm text-gray-700 hover:bg-[#f00c93] hover:text-white rounded">Dashboard</a>
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-start text-sm text-gray-700 hover:bg-[#f00c93] hover:text-white rounded">
                                        Sign out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

            @endauth

            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm focus:outline-none md:hidden"
                aria-controls="navbar-user" aria-expanded="false" id="burger-menu-button">
                <svg class="vbp-header-menu-button__svg">
                    <line x1="0" y1="50%" x2="100%" y2="50%" class="top"
                        shape-rendering="crispEdges" />
                    <line x1="0" y1="50%" x2="100%" y2="50%" class="middle"
                        shape-rendering="crispEdges" />
                    <line x1="0" y1="50%" x2="100%" y2="50%" class="bottom"
                        shape-rendering="crispEdges" />
                </svg>
            </button>
        </div>
        <div class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto" id="navbar-user">
            <ul
                class="mt-4 flex flex-col rounded-lg border border-gray-100 p-4 font-medium rtl:space-x-reverse  md:mt-0 md:flex-row md:border-0 md:p-0">
                @foreach ($menu_items as $item)
                    <li>
                        @if (Route::currentRouteName() == 'home')
                            <div data-section="{{ $item['slug'] }}"
                                class="navlink mr-5 block rounded px-3 py-2 text-gray-600 hover:cursor-pointer hover:text-[#f00c93] md:p-0">
                                {{ $item['title'] }}
                            </div>
                        @else
                            <a href="{{ route('home') }}" data-section="{{ $item['slug'] }}"
                                class="navlink mr-5 block rounded px-3 py-2 text-gray-600 hover:cursor-pointer hover:text-[#f00c93] md:p-0">
                                {{ $item['title'] }}
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>

        <div id="mobile-navbar" class="z-49 fixed right-0 top-[102px] h-full md:hidden">
            <div class="block h-full w-full bg-white">
                <ul class="flex h-full flex-col bg-[#f00c93] p-4 font-medium">
                    @foreach ($menu_items as $item)
                        <li class="flex justify-center">
                            @if (Route::currentRouteName() == 'home')
                                <div data-section="{{ $item['slug'] }}"
                                    class="navlink w-fit-content mx-6 block rounded px-1 py-2 text-center text-white md:p-0">
                                    {{ $item['title'] }}
                                </div>
                            @else
                                <a href="{{ route('home') }}" data-section="{{ $item['slug'] }}"
                                    class="navlink w-fit-content mx-6 block rounded px-1 py-2 text-center text-white md:p-0">
                                    {{ $item['title'] }}
                                </a>
                            @endif
                        </li>
                    @endforeach

                    {{-- @auth

                        <li class="flex justify-center">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit"
                                    class="navlink w-fit-content mx-6 block rounded px-1 py-2 text-center text-white md:p-0">Logout</button>
                            </form>
                        </li>
                    @endauth --}}
                    @guest

                        <div class="my-4 flex justify-center border-t-2 border-[#ed6fb7]"></div>

                        <div class="flex justify-center">
                            <a href="{{ route('login') }}"
                                class="btn w-fit-content mx-6 block rounded rounded bg-white px-6 py-2 text-center text-[#f00c93] md:p-0">{{ $settings['navbar_login_button'] }}</a>
                        </div>

                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
