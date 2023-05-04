<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="/">
            {{ App\Models\Setting::first()->app_name ?? '' }}
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @if (request()->routeIs('home'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold @if (request()->routeIs('home')) text-gray-800 dark:text-gray-100 @endif
                    dark:hover:text-gray-200 transition-colors duration-150 hover:text-gray-800 "
                    href="{{ route('home') }}">
                    <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">{{ __('messages.home') }}</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                @if (request()->routeIs('agency_invoices') || request()->routeIs('view_invoice'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true">
                    </span>
                @endif
                <a class="inline-flex items-center w-full text-sm @if (request()->routeIs('agency_invoices') || request()->routeIs('view_invoice')) text-gray-800 dark:text-gray-100 @endif font-semibold transition-colors
                    duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('agency_invoices') }}">
                    <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">{{ __('messages.invoices') }}</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin_order'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true">
                    </span>
                @endif
                <a class="inline-flex items-center w-full text-sm @if (request()->routeIs('admin_order') || request()->routeIs('view_invoice')) text-gray-800 dark:text-gray-100 @endif font-semibold transition-colors
                    duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin_order') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                      </svg>
                    <span class="ml-4">{{ __('messages.orders') }}</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin_services'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold @if (request()->routeIs('admin_services')) text-gray-800 dark:text-gray-100 @endif transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin_services') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                      </svg>
                    <span class="ml-4">{{ __('messages.services') }}</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (request()->routeIs('tickets'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold @if (request()->routeIs('tickets')) text-gray-800 dark:text-gray-100 @endif transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('tickets') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                      </svg>
                    <span class="ml-4">{{ __('messages.tickets_suports') }}</span>
                </a>
            </li>

            <li x-data="{menuAdmin:false}" class="relative px-6 py-3  text-gray-800 dark:text-gray-100">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="menuAdmin=!menuAdmin" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                            </path>
                        </svg>
                        <span class="ml-4">{{ __('messages.administration') }}</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="menuAdmin">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 @if (request()->
                            routeIs('agency_setting')) text-gray-800 dark:text-gray-100 @endif
                            hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('agency_setting') }}">
                                {{ __('messages.settings') }}</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 @if (request()->
                            routeIs('agency_clients')) text-gray-800 dark:text-gray-100 @endif
                            hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full"
                                href="{{ route('agency_clients') }}">{{ __('messages.clients') }}</a>
                        </li>
                    </ul>
                </template>
            </li>
        </ul>
    </div>

</aside>
