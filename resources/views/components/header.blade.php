<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
    <div  
        class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
        <!-- Mobile hamburger -->
        <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
            @click="sidebar=!sidebar" aria-label="Menu">
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <!-- Search input -->
        <div class="flex justify-center flex-1 lg:mr-32">
            <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">

            </div>
        </div>

        <ul class="flex items-center flex-shrink-0 mx-3 space-x-6">
            
            <li class="flex">
                <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="darkMode = !darkMode"
                    aria-label="Toggle color mode">
                    <template x-if="!darkMode">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                    </template>
                    <template x-if="darkMode">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </template>
                </button>
            </li>
            <!-- Notifications menu -->
            <li class="relative">
                <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
                    @click="notifica=!notifica" @keydown.escape="notifica=false" aria-label="Notifications"
                    aria-haspopup="true">
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                        </path>
                    </svg>
                    <!-- Notification badge -->
                    @if (Auth::user()->notifications->where('status', 0)->count() > 0)
                        <span aria-hidden="true"
                            class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
                    @endif
                </button>
                <template @click.away="notifica=false" @keydown.escape="notifica=false" x-if="notifica">
                    <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700">
                        <li class="flex">
                            <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                href="{{ route('central_notifications') }}">
                                <span>Notificaciones</span>
                                <span
                                    class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                                    {{ Auth::user()->notifications->where('status', 0)->count() }}
                                </span>
                            </a>
                        </li>
                        <li class="flex">
                            <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                href="{{ route('tickets') }}">
                                <span>Tickets</span>

                            </a>
                        </li>

                    </ul>
                </template>
            </li>
            <!-- Profile menu -->
        </ul>
        <div class="px-3   relative inline-block text-left">
            <div>
                <button @click="profile=!profile" type="button"
                    class="group w-full bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded-md px-3.5 py-1 text-sm text-left font-medium  hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500"
                    id="options-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="flex w-full justify-between items-center">
                        <span class="flex min-w-0 items-center justify-between space-x-3">
                            <img class="w-8 h-8 bg-gray-300 rounded-full flex-shrink-0"
                                src="{{ Auth::user()->avatar }}">
                            <span class="flex-1 flex flex-col min-w-0">
                                <span
                                    class="text-gray-900 dark:text-gray-200  text-sm font-medium truncate">{{ Str::limit(Auth::user()->name, 2) }}</span>
                            </span>
                        </span>
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
            </div>
            <div x-cloak @click.away="profile=false" x-show="profile"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transition ease-in duration-75"
                x-transition:leave="transition-all ease-in-out duration-300"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white dark:bg-gray-700  ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button" tabindex="-1">
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
    </div>
</header>
