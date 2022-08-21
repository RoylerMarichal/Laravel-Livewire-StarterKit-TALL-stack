 <nav class="bg-white shadow" x-data="{menu:false,menuProfile:false}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <img class="block  h-8 w-auto"
                        src="{{$setting->logo}}" >
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="#main"
                        class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Inicio
                    </a>
                    <a href="#services"
                        class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        {{ __('messages.services') }}
                    </a>
                </div>
            </div>
            <div class=" sm:ml-6 sm:flex sm:items-center">
                @auth
                    <!-- Profile dropdown -->
                    <div class="ml-3 relative">
                        <div>
                            <button type="button" @click="menuProfile=!menuProfile"
                                class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="{{Auth::user()->avatar}}"
                                    alt="">
                            </button>
                        </div>

                        <div x-cloak x-show="menuProfile" @click.away="menuProfile=false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <div class="py-1 hover:opacity-80" role="none">
                                <a href="{{ route('home') }}"
                                    class="text-gray-700 dark:text-gray-200 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                                    id="options-menu-item-0">{{ __('messages.home') }}</a>
                            </div>
                            <div class="py-1 hover:opacity-80" role="none">
                                <a href="{{ route('profile', Auth::user()->id) }}"
                                    class="text-gray-700 dark:text-gray-200 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                                    id="options-menu-item-0">{{ __('messages.profile') }}</a>
                            </div>
                            <div class="py-1 hover:opacity-80" role="none">
                                <a href="/exit" class="text-gray-700 block px-4 py-2 text-sm dark:text-gray-200" role="menuitem"
                                    tabindex="-1" id="options-menu-item-3">{{ __('messages.exit') }}</a>
                            </div>

                        </div>
                    </div>
                @endauth
                @guest
                <!-- Login and register -->
                <div class="m-7 p-3 flex  ">
                    <a href="/login" class="whitespace-nowrap pt-2 text-base m-3 font-medium text-gray-500 hover:text-gray-900">
                        Sign in
                    </a>
                    <a href="/register"
                        class="ml-8 whitespace-nowrap inline-flex m-3 items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        Sign up
                    </a>
                </div>
                @endguest
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="menu=!menu"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>

                    <svg :class="{ 'hidden': menu }" class=" block h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <svg :class="{ 'block': menu , 'hidden': !menu }" class="  h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-cloak x-show="menu" @click.away="menu=false" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95" class="sm:hidden" id="mobile-menu">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700" -->
            <a href="#"
                class="bg-indigo-50 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Dashboard</a>
            <a href="#"
                class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Team</a>
            <a href="#"
                class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Projects</a>
            <a href="#"
                class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Calendar</a>
        </div>
        @auth
            <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full"
                            src="{{Auth::user()->avatar}}"
                            alt="{{Auth::user()->name}}">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-gray-800">{{Auth::user()->name}}</div>
                        <div class="text-sm font-medium text-gray-500">{{Auth::user()->email}}</div>
                    </div>
                </div>
                <div class="py-1 hover:opacity-80" role="none">
                    <a href="{{ route('home') }}"
                        class="text-gray-700 dark:text-gray-200 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                        id="options-menu-item-0">{{ __('messages.home') }}</a>
                </div>
                <div class="py-1 hover:opacity-80" role="none">
                    <a href="{{ route('profile', Auth::user()->id) }}"
                        class="text-gray-700 dark:text-gray-200 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                        id="options-menu-item-0">{{ __('messages.profile') }}</a>
                </div>
                <div class="py-1 hover:opacity-80" role="none">
                    <a href="/exit" class="text-gray-700 block px-4 py-2 text-sm dark:text-gray-200" role="menuitem"
                        tabindex="-1" id="options-menu-item-3">{{ __('messages.exit') }}</a>
                </div>
            </div>
        @endauth
        @guest
             <!-- Login and register -->
             <div class=" md:flex items-center justify-end md:flex-1 lg:w-0">
                <a href="/login" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
                    Sign in
                </a>
                <a href="/register"
                    class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                    Sign up
                </a>
            </div>
        @endguest
    </div>
</nav>
