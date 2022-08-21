<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
x-show="sidebar" x-transition:enter="transition ease-in-out duration-150"
x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="sidebar=false"
@keydown.escape="sidebar=false">
<div class="py-4 text-gray-500 dark:text-gray-400">
    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
        {{App\Models\Setting::first()->app_name ?? ''}}
    </a>
    <ul class="mt-6">
        <li class="relative px-6 py-3">
            @if (request()->routeIs('home'))
                <span class="absolute  left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold @if(request()->routeIs('home')) text-gray-800 dark:text-gray-100 @endif dark:hover:text-gray-200 transition-colors duration-150 hover:text-gray-800 "
                href="{{ route('home') }}">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span class="ml-4"> {{ __('messages.home') }}</span>
            </a>
        </li>
    </ul>
    <ul class="">
        <li class="relative px-6 py-3">
            @if(request()->routeIs('agency_invoices') || request()->routeIs('view_invoice'))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true">
                </span>
            @endif
            <a class="inline-flex items-center w-full text-sm @if(request()->routeIs('agency_invoices') || request()->routeIs('view_invoice')) text-gray-800 dark:text-gray-100 @endif font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{ route('agency_invoices') }}">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                    </path>
                </svg>
                <span class="ml-4"> {{ __('messages.invoices') }}</span>
            </a>
        </li>
        <li class="relative px-6 py-3">
            @if (request()->routeIs('orders'))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true">
                </span>
            @endif
            <a class="inline-flex items-center w-full text-sm @if (request()->routeIs('orders')) text-gray-800 dark:text-gray-100 @endif font-semibold transition-colors
                duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{ route('orders') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                  </svg>
                <span class="ml-4">{{ __('messages.orders') }}</span>
            </a>
        </li>
    </ul>
    <div class="px-6 my-6">
        <a href="/#buy"><button
            class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            {{ __('messages.buy') }}
            <span class="ml-2" aria-hidden="true">+</span>
        </button></a>
    </div>
</div>
</aside>
