<div>
    @section('metas')
        <title>{{ __('messages.settings') }}</title>
    @endsection
    <div x-data="{ page: 'general' }">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold  dark:text-gray-200">
                {{ __('messages.settings') }}
            </h2>
            <main class="relative ">
                <div class="max-w-screen-xl mx-auto pb-6 px-4 sm:px-6 lg:pb-16 lg:px-8">
                    <div class=" daark:bg-gray-800  dark:text-gray-200 rounded-lg shadow overflow-hidden">
                        <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
                            <aside class="py-6 lg:col-span-3">
                                <nav class="space-y-1">
                                    <a href="#" @click="page='general'"
                                        x-bind:class="{ 'bg-teal-50 border-teal-500 border-l-4 text-teal-700 hover:bg-teal-50 hover:text-teal-700 ': page=='general' }"
                                        class=" group  px-3 py-2 flex items-center text-sm font-medium"
                                        aria-current="page">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            x-bind:class="{ 'text-teal-500 group-hover:text-teal-500': page=='general' }"
                                            class=" flex-shrink-0 -ml-1 mr-3 h-6 w-6 text-gray-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                        </svg>
                                        <span class="truncate">
                                            General
                                        </span>
                                    </a>
                                    <a href="#" @click="page='visual'"
                                        x-bind:class="{ 'bg-teal-50 border-teal-500 border-l-4 text-teal-700 hover:bg-teal-50 hover:text-teal-700   ': page=='visual' }"
                                        class="group border-l-4 px-3 py-2 flex items-center text-sm font-medium"
                                        aria-current="page">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            x-bind:class="{ 'text-teal-500 group-hover:text-teal-500': page=='visual' }"
                                            class="text-gray-400 flex-shrink-0 -ml-1 mr-3 h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        <span class="truncate">
                                            Visual
                                        </span>
                                    </a>
                                    <a href="#" @click="page='invoices'"
                                        x-bind:class="{ 'bg-teal-50 border-teal-500 border-l-4 text-teal-700 hover:bg-teal-50 hover:text-teal-700   ': page=='invoices' }"
                                        class="group border-l-4 px-3 py-2 flex items-center text-sm font-medium"
                                        aria-current="page">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            x-bind:class="{ 'text-teal-500 group-hover:text-teal-500': page=='invoices' }"
                                            class="text-gray-400 flex-shrink-0 -ml-1 mr-3 h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                        <span class="truncate">
                                            {{ __('messages.invoicing') }}
                                        </span>
                                    </a>
                                    <a href="#" @click="page='modules'"
                                        x-bind:class="{ 'bg-teal-50 border-teal-500 border-l-4 text-teal-700 hover:bg-teal-50 hover:text-teal-700   ': page=='modules' }"
                                        class="group border-l-4 px-3 py-2 flex items-center text-sm font-medium"
                                        aria-current="page">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            x-bind:class="{ 'text-teal-500 group-hover:text-teal-500': page=='modules' }"
                                            class="text-gray-400 flex-shrink-0 -ml-1 mr-3 h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                                        </svg>
                                        <span class="truncate">
                                            {{ __('messages.modules') }}
                                        </span>
                                    </a>



                                </nav>
                            </aside>
                            {{-- General --}}
                            <div wire:ignore.self x-show="page=='general'"
                                class="divide-y divide-gray-200 lg:col-span-9">
                                <div class="py-6 px-4 sm:p-6 lg:pb-8">
                                    <div>
                                        <h2 class="text-lg leading-6 font-medium ">
                                            {{ __('messages.general_setting') }}</h2>
                                        <p class="mt-1 text-sm ">
                                            {{ __('messages.general_setting_p1') }}
                                        </p>
                                    </div>

                                    <div class="mt-6 flex flex-col lg:flex-row">
                                        <div class="flex-grow space-y-6">
                                            <div>
                                                <label for="username"
                                                    class="block text-sm font-medium dark:text-gray-400 ">
                                                    {{ __('messages.name_aplication') }}
                                                </label>
                                                <div class="mt-1 rounded-md shadow-sm flex">
                                                    <input wire:model.lazy="name" type="text"
                                                        class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300 dark:bg-gray-700 dark:text-gray-200"
                                                        value="deblewis">
                                                </div>
                                                @error('name')
                                                    <span class="text-red-500">{{ $messsaje }}</span>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="username"
                                                    class="block text-sm font-medium dark:text-gray-400 ">
                                                    {{ __('messages.currency_default') }}
                                                </label>
                                                <div class="mt-1 rounded-md shadow-sm flex">
                                                    <input wire:model.lazy="currency" type="text"
                                                        class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300 dark:bg-gray-700 dark:text-gray-200"
                                                        value="deblewis">
                                                </div>
                                                @error('currency')
                                                    <span class="text-red-500">{{ $messsaje }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>


                                </div>


                                <div class="pt-6 divide-y divide-gray-200">
                                    <div class="px-4 sm:px-6">
                                        <ul class="mt-2 divide-y divide-gray-200">
                                            <li class="py-4 flex items-center justify-between">
                                                <div class="flex flex-col">
                                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-200"
                                                        id="privacy-option-1-label">
                                                        {{ __('messages.register_user') }}
                                                    </p>
                                                    <p class="text-sm text-gray-500" id="privacy-option-1-description">
                                                        {{ __('messages.register_user_p1') }}
                                                    </p>
                                                </div>


                                                <!-- Enabled: "bg-teal-500", Not Enabled: "bg-gray-200" -->
                                            <button wire:click="changeRegister()" type="button" class=" @if ($register) bg-teal-500 pl-5 @else
                                                                bg-gray-200 @endif relative inline-flex
                                                    flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full
                                                    cursor-pointer transition-colors ease-in-out duration-200
                                                    focus:outline-none focus:ring-2 focus:ring-offset-2
                                                    focus:ring-sky-500" role="switch" aria-checked="true"
                                                    aria-labelledby="privacy-option-1-label"
                                                    aria-describedby="privacy-option-1-description">
                                                    <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->

                                                    <span aria-hidden="true" class="
                    @if ($register) translate-x-5  @else
                                                            translate-x-0 @endif inline-block h-5 w-5
                                                        rounded-full bg-white shadow transform ring-0 transition
                                                        ease-in-out duration-200"></span>
                                                </button>
                                            </li>


                                        </ul>
                                    </div>

                                </div>
                            </div>
                            {{-- Visual --}}
                            <div wire:ignore.self x-show="page=='visual'"
                                class="divide-y divide-gray-200 lg:col-span-9">

                                <div class="py-6 px-4 sm:p-6 lg:pb-8">
                                    <div>
                                        <h2 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200">
                                            {{ __('messages.visual_setting') }}</h2>
                                    </div>
                                    <div class="mt-6 flex flex-col lg:flex-row">
                                        <div
                                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start dark:text-gray-300   sm:pt-5">
                                            <label for="logo"
                                                class="block text-sm font-medium dark:text-gray-400  dark:text-gray-300 text-gray-700 sm:mt-px sm:pt-2">
                                                Actualiza el logo
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <div class="max-w-lg flex rounded-md shadow-sm">
                                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                        <div class="flex items-center">
                                                            <span
                                                                class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                                                @if ($logo)
                                                                    <img src="{{ $logo }}">
                                                                @else
                                                                    <svg class="h-full w-full text-gray-300"
                                                                        fill="currentColor" viewBox="0 0 24 24">
                                                                        <path
                                                                            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                                    </svg>
                                                                @endif
                                                            </span>
                                                            <button onclick="document.getElementById('file').click();"
                                                                type="file"
                                                                class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                Cambiar
                                                            </button>
                                                            <span wire:loading="logo" wire:target="logo"
                                                                class="text-red-500 ml-5">Cargando...</span>
                                                            <input wire:model="logo" type="file" style="display:none;"
                                                                id="file" name="file" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start dark:text-gray-300   sm:pt-5">
                                            <label for="username"
                                                class="block text-sm font-medium dark:text-gray-400  dark:text-gray-300 text-gray-700 sm:mt-px sm:pt-2">
                                                Actualiza el favicon
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <div class="max-w-lg flex rounded-md shadow-sm">
                                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                        <div class="flex items-center">
                                                            <span
                                                                class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                                                @if ($favicon)
                                                                    <img src="{{ $favicon }}">
                                                                @else
                                                                    <svg class="h-full w-full text-gray-300"
                                                                        fill="currentColor" viewBox="0 0 24 24">
                                                                        <path
                                                                            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                                    </svg>
                                                                @endif
                                                            </span>
                                                            <button onclick="document.getElementById('file2').click();"
                                                                type="file"
                                                                class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                Cambiar
                                                            </button>
                                                            <span wire:loading="favicon" wire:target="favicon"
                                                                class="text-red-500 ml-5">Cargando...</span>
                                                            <input wire:model="favicon" type="file"
                                                                style="display:none;" id="file2" name="file" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200">
                                                    {{ __('messages.home_page') }}</h2>
                                            </div>
                                            <div>
                                                <label for="username" class="block text-sm font-medium dark:text-gray-400 ">
                                                    {{ __('messages.main_title') }}
                                                </label>
                                                <div class="mt-1 rounded-md shadow-sm flex">
                                                    <input wire:model.lazy="titleOne" type="text"
                                                        class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300 border-gray-300 dark:bg-gray-700 dark:text-gray-200"
                                                        value="deblewis">
                                                </div>
                                                @error('titleOne')
                                                    <span class="text-red-500">{{ $messsaje }}</span>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="username" class="block text-sm font-medium dark:text-gray-400 ">
                                                    {{ __('messages.submain_title') }}
                                                </label>
                                                <div class="mt-1 rounded-md shadow-sm flex">
                                                    <input wire:model.lazy="subtitleOne" type="text"
                                                        class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300 border-gray-300 dark:bg-gray-700 dark:text-gray-200"
                                                        value="deblewis">
                                                </div>
                                                @error('subtitleOne')
                                                    <span class="text-red-500">{{ $messsaje }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            {{-- Invoices --}}
                            <div wire:ignore.self x-show="page=='invoices'"
                                class="divide-y divide-gray-200 lg:col-span-9">
                                <!-- Profile section -->
                                <div class="py-6 px-4 sm:p-6 lg:pb-8">
                                    <div>
                                        <h2 class="text-lg leading-6 font-medium ">
                                            {{ __('messages.setting_invoiing') }}</h2>
                                        <p class="mt-1 text-sm ">
                                            {{ __('messages.setting_invoiing_p1') }}
                                        </p>
                                    </div>
                                    <div class="pt-6 divide-y divide-gray-200">
                                        <div class="px-4 sm:px-6">
                                            <ul class="mt-2 divide-y divide-gray-200">
                                                <li class="py-4 flex items-center justify-between">
                                                    <div class="flex flex-col">
                                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-200"
                                                            id="privacy-option-1-label">
                                                            QvaPay.com
                                                        </p>
                                                        <p class="text-sm text-gray-500"
                                                            id="privacy-option-1-description">
                                                            {{ __('messages.qvapay_p1') }}
                                                        </p>
                                                    </div>

                                                    <button wire:click="changeQvapay()" type="button"
                                                    class=" @if ($qvapay) bg-teal-500 pl-5 @else
                                                                    bg-gray-200 @endif relative
                                                        inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent
                                                        rounded-full cursor-pointer transition-colors ease-in-out
                                                        duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2
                                                        focus:ring-sky-500" role="switch" aria-checked="true"
                                                        aria-labelledby="privacy-option-1-label"
                                                        aria-describedby="privacy-option-1-description">

                                                        <span aria-hidden="true" class="
                                    @if ($qvapay) translate-x-5  @else
                                                                translate-x-0 @endif inline-block h-5 w-5
                                                            rounded-full bg-white shadow transform ring-0 transition
                                                            ease-in-out duration-200"></span>
                                                    </button>
                                                </li>
                                            </ul>
                                            <div class=" @if (!$qvapay) opacity-20 @endif">
                                                <label for="username"
                                                    class="block text-sm font-medium dark:text-gray-400 ">
                                                    APP ID - Qvapay
                                                </label>
                                                <div class="mt-1 rounded-md shadow-sm flex">
                                                    <input wire:model.lazy="appId" type="text"
                                                        class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300 border-gray-300 dark:bg-gray-700 dark:text-gray-200"
                                                        value="deblewis">
                                                </div>
                                                @error('appId')
                                                    <span class="text-red-500">{{ $messsaje }}</span>
                                                @enderror
                                            </div>
                                            <div class=" @if (!$qvapay) opacity-20 @endif mt-2">
                                                <label for="app_secret"
                                                    class="block text-sm font-medium dark:text-gray-400 ">
                                                    APP SECRET - Qvapay
                                                </label>
                                                <div class="mt-1 rounded-md shadow-sm flex">
                                                    <input wire:model.lazy="appSecret" type="text"
                                                        class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300 dark:bg-gray-700 dark:text-gray-200"
                                                        value="deblewis">
                                                </div>
                                                @error('appSecret')
                                                    <span class="text-red-500">{{ $messsaje }}</span>
                                                @enderror
                                            </div>

                                            <li class="py-4 flex items-center justify-between">
                                                <div class="flex flex-col">
                                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-200"
                                                        id="privacy-option-2-label">
                                                        {{ __('messages.pay_manual') }}
                                                    </p>
                                                    <p class="text-sm text-gray-500" id="privacy-option-2-description">
                                                        {{ __('messages.pay_manual_p1') }}
                                                    </p>
                                                </div>

                                            <button wire:click="changeManual()" type="button" class=" @if ($manual) bg-teal-500 pl-5 @else
                                                     bg-gray-200 @endif relative inline-flex
                                                    flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full
                                                    cursor-pointer transition-colors ease-in-out duration-200
                                                    focus:outline-none focus:ring-2 focus:ring-offset-2
                                                    focus:ring-sky-500" role="switch" aria-checked="true"
                                                    aria-labelledby="privacy-option-1-label"
                                                    aria-describedby="privacy-option-1-description">

                                                    <span aria-hidden="true" class="
                                        @if ($manual) translate-x-5  @else
                                                         translate-x-0 @endif inline-block h-5 w-5
                                                        rounded-full bg-white shadow transform ring-0 transition
                                                        ease-in-out duration-200"></span>
                                                </button>
                                            </li>
                                            <div class=" @if (!$manual) opacity-20 @endif mt-2">
                                                <label for="app_secret"
                                                    class="block text-sm font-medium dark:text-gray-400 ">
                                                    {{ __('messages.card_or_account') }}
                                                </label>
                                                <div class="mt-1 rounded-md shadow-sm flex">
                                                    <input wire:model.lazy="card" type="text"
                                                        class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300 dark:bg-gray-700 dark:text-gray-200"
                                                        value="deblewis">
                                                </div>
                                                @error('card')
                                                    <span class="text-red-500">{{ $messsaje }}</span>
                                                @enderror
                                            </div>
                                            <div class=" @if (!$manual) opacity-20 @endif mt-2">
                                                <label for="cardInfo"
                                                    class="block text-sm font-medium dark:text-gray-400 ">
                                                    {{ __('messages.indications') }} <small>(Opcional)</small>

                                                </label>
                                                <div class="mt-1 rounded-md shadow-sm flex">
                                                    <input wire:model.lazy="cardInfo" type="text"
                                                        class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300 dark:bg-gray-700 dark:text-gray-200"
                                                        value="deblewis">
                                                </div>
                                                @error('cardInfo')
                                                    <span class="text-red-500">{{ $messsaje }}</span>
                                                @enderror
                                            </div>
                                            <li class="py-4 flex items-center justify-between">
                                                <div class="flex flex-col">
                                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-200"
                                                        id="privacy-option-2-label">
                                                        Enzona
                                                    </p>
                                                    <p class="text-sm text-gray-500" id="privacy-option-2-description">
                                                        {{ __('messages.enzona_p1') }}
                                                    </p>
                                                </div>

                                            <button wire:click="changeEnzona()" type="button" class=" @if ($enzona) bg-teal-500 pl-5 @else
                                                     bg-gray-200 @endif relative inline-flex
                                                    flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full
                                                    cursor-pointer transition-colors ease-in-out duration-200
                                                    focus:outline-none focus:ring-2 focus:ring-offset-2
                                                    focus:ring-sky-500" role="switch" aria-checked="true"
                                                    aria-labelledby="privacy-option-1-label"
                                                    aria-describedby="privacy-option-1-description">


                                                    <span aria-hidden="true" class="
                                        @if ($enzona) translate-x-5  @else
                                                         translate-x-0 @endif inline-block h-5 w-5
                                                        rounded-full bg-white shadow transform ring-0 transition
                                                        ease-in-out duration-200"></span>
                                                </button>
                                            </li>
                                            <div class=" @if (!$enzona) opacity-20 @endif mt-2">
                                                <label for="app_secret"
                                                    class="block text-sm font-medium dark:text-gray-400 ">
                                                    Client Key
                                                </label>
                                                <div class="mt-1 rounded-md shadow-sm flex">
                                                    <input wire:model.lazy="enzonack" type="text"
                                                        class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300 dark:bg-gray-700 dark:text-gray-200"
                                                        value="deblewis">
                                                </div>
                                                @error('enzonack')
                                                    <span class="text-red-500">{{ $messsaje }}</span>
                                                @enderror
                                            </div>
                                            <div class=" @if (!$enzona) opacity-20 @endif mt-2">
                                                <label for="cardInfo"
                                                    class="block text-sm font-medium dark:text-gray-400 ">
                                                    Client Secret

                                                </label>
                                                <div class="mt-1 rounded-md shadow-sm flex">
                                                    <input wire:model.lazy="enzonacs" type="text"
                                                        class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300 dark:bg-gray-700 dark:text-gray-200"
                                                        value="deblewis">
                                                </div>
                                                @error('enzonacs')
                                                    <span class="text-red-500">{{ $messsaje }}</span>
                                                @enderror
                                            </div>
                                            <li class="py-4 flex items-center justify-between">
                                                <div class="flex flex-col">
                                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-200"
                                                        id="privacy-option-2-label">
                                                        Stripe
                                                    </p>
                                                    <p class="text-sm text-gray-500" id="privacy-option-2-description">
                                                        {{ __('messages.stripe_p1') }}
                                                    </p>
                                                </div>

                                            <button wire:click="changeStripe()" type="button" class=" @if ($stripe) bg-teal-500 pl-5 @else
                                                     bg-gray-200 @endif relative inline-flex
                                                    flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full
                                                    cursor-pointer transition-colors ease-in-out duration-200
                                                    focus:outline-none focus:ring-2 focus:ring-offset-2
                                                    focus:ring-sky-500" role="switch" aria-checked="true"
                                                    aria-labelledby="privacy-option-1-label"
                                                    aria-describedby="privacy-option-1-description">

                                                    <span aria-hidden="true" class="
                                        @if ($stripe) translate-x-5  @else
                                                         translate-x-0 @endif inline-block h-5 w-5
                                                        rounded-full bg-white shadow transform ring-0 transition
                                                        ease-in-out duration-200"></span>
                                                </button>
                                            </li>
                                            <div class=" @if (!$stripe) opacity-20 @endif mt-2">
                                                <label for="app_secret"
                                                    class="block text-sm font-medium dark:text-gray-400 ">
                                                    APP Key
                                                </label>
                                                <div class="mt-1 rounded-md shadow-sm flex">
                                                    <input wire:model.lazy="stripeKey" type="text"
                                                        class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300 dark:bg-gray-700 dark:text-gray-200"
                                                        value="deblewis">
                                                </div>
                                                @error('stripeKey')
                                                    <span class="text-red-500">{{ $messsaje }}</span>
                                                @enderror
                                            </div>
                                            <div class=" @if (!$stripe) opacity-20 @endif mt-2">
                                                <label for="cardInfo"
                                                    class="block text-sm font-medium dark:text-gray-400 ">
                                                    APP Secret

                                                </label>
                                                <div class="mt-1 rounded-md shadow-sm flex">
                                                    <input wire:model.lazy="stripeSecret" type="text"
                                                        class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300 dark:bg-gray-700 dark:text-gray-200"
                                                        value="deblewis">
                                                </div>
                                                @error('stripeSectret')
                                                    <span class="text-red-500">{{ $messsaje }}</span>
                                                @enderror
                                            </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Modules --}}
                            <div wire:ignore.self x-show="page=='modules'"
                                class="divide-y divide-gray-200 lg:col-span-9">

                                <div class="pt-6 divide-y divide-gray-200">
                                    <div class="px-4 sm:px-6">
                                        <ul class="mt-2 divide-y divide-gray-200">
                                            <li class="py-4 flex items-center justify-between">
                                                <div class="flex flex-col">
                                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-200"
                                                        id="privacy-option-1-label">
                                                        {{ __('messages.stats_system') }}
                                                    </p>
                                                    <p class="text-sm text-gray-500" id="privacy-option-1-description">
                                                        {{ __('messages.stats_system_data') }}
                                                    </p>
                                                </div>


                                                <!-- Enabled: "bg-teal-500", Not Enabled: "bg-gray-200" -->
                                            <button wire:click="changeStats()" type="button" class=" @if ($moduleStats) bg-teal-500 pl-5 @else
                                                    bg-gray-200 @endif relative inline-flex
                                                    flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full
                                                    cursor-pointer transition-colors ease-in-out duration-200
                                                    focus:outline-none focus:ring-2 focus:ring-offset-2
                                                    focus:ring-sky-500" role="switch" aria-checked="true"
                                                    aria-labelledby="privacy-option-1-label"
                                                    aria-describedby="privacy-option-1-description">

                                                    <span aria-hidden="true" class="
                                                      @if ($moduleStats) translate-x-5  @else
                                                        translate-x-0 @endif inline-block h-5 w-5
                                                        rounded-full bg-white shadow transform ring-0 transition
                                                        ease-in-out duration-200"></span>
                                                </button>
                                            </li>


                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
