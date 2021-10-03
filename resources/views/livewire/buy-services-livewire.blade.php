<div>
    @forelse ($services as $service)
        <div class="mt-8 bg-white pb-16 sm:mt-12 sm:pb-20 lg:pb-28">
            <div class="relative">
                <div class="absolute inset-0 h-1/2 bg-gray-100"></div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="max-w-lg mx-auto rounded-lg shadow-lg overflow-hidden lg:max-w-none lg:flex">
                        <div class="flex-1 bg-white px-6 py-8 lg:p-12">
                            <h3 class="text-2xl font-extrabold text-gray-900 sm:text-3xl">
                                {{ $service->name }}
                            </h3>
                            <p class="mt-6 text-base text-gray-500">
                                {{ $service->description }}
                            </p>
                            <div class="mt-8">
                                <div class="flex items-center">
                                    <h4
                                        class="flex-shrink-0 pr-4 bg-white text-sm tracking-wider font-semibold uppercase text-indigo-600">
                                        {{ __('messages.wh_included') }}
                                    </h4>
                                    <div class="flex-1 border-t-2 border-gray-200"></div>
                                </div>
                                <ul role="list"
                                    class="mt-8 space-y-5 lg:space-y-0 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:gap-y-5">
                                    @forelse ($service->features as $feature)
                                        <li class="flex items-start lg:col-span-1">
                                            <div class="flex-shrink-0">
                                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm text-gray-700">
                                                {{ $feature->feature }}
                                            </p>
                                        </li>
                                    @empty
                                        <span> {{ __('messages.no_feature') }}</span>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div
                            class="py-8 px-6 text-center bg-gray-50 lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12">
                            {{-- <p class="text-lg leading-6 font-medium text-gray-900">
                       Edit subtitle
                    </p> --}}
                            <div class="mt-4 flex items-center justify-center text-5xl font-extrabold text-gray-900">
                                <span>
                                    $ {{ $service->price }}
                                </span>
                                <span class="ml-3 text-xl font-medium text-gray-500">
                                    {{ $setting->currency }}
                                </span>
                            </div>

                            <div class="mt-6">
                                <div class="rounded-md shadow">
                                    <a wire:click="SelectBuyService({{ $service->id }})" x-on:click="buyService=true"
                                        class="flex cursor-pointer items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gray-800 hover:bg-gray-900">
                                        {{ __('messages.buy') }}
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <span> {{ __('messages.no_services') }}</span>
    @endforelse

    @if($serviceToBuy)
    <div x-cloak x-on:click.away="buyService=false" wire:ignore.self x-show="buyService"
        x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0  flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
        style="z-index: 9999999;">
        <!-- Modal -->
        <div x-show="buyService" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="buyService=false"
            @keydown.escape="buyService=false"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">

                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="buyService=false">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>

            </header>
            <body>
                <div class="flex-col space-y-3">
                    <span class="text-lg text-center font-medium">{{ __('messages.buy_service') }}</span>
                    <span class="text-sm">{{$serviceToBuy->name}}</span>
                    <input wire:model.lazy="clientName" type="text" class="input-text" placeholder="{{ __('messages.name') }}">
                    <input wire:model.lazy="clientEmail" type="text" class="input-text" placeholder="{{ __('messages.email') }}">
                    <input wire:model.lazy="clientPhone" type="text" class="input-text" placeholder="{{ __('messages.phone') }}">
                    <button wire:click="buyService" class="btn-blue">{{ __('messages.buy') }}</button>
                </div>
            </body>
        </div>
    </div>
    @endif
</div>
