<div>
    @section('metas')
        <title>{{ __('messages.services') }}</title>
    @endsection
    <div class="container px-6 mt-2 py-6 pb-5 mx-auto ">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-4">

                <li>
                    <div class="flex items-center">

                        <a href="{{ route('home') }}"
                            class="ml-4 dark:hover:text-gray-200 text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('messages.home') }}</a>
                    </div>
                </li>

                <li>
                    <div class="flex items-center">

                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <a href="#"
                            class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700 dark:hover:text-gray-200"
                            aria-current="page">{{ __('messages.services') }}</a>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mt-6 ">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('messages.services') }}
            </h2>
            <div class="w-full grid grid-cols-1 gap-6 lg:grid-cols-2 overflow-hidden rounded-lg ">
                <div class="w-full col-span-1 overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            @if ($services->count() > 0)
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">{{ __('messages.name') }}</th>
                                    <th class="px-4 py-3">{{ __('messages.status') }}</th>
                                    <th class="px-4 py-3">{{ __('messages.price') }}</th>
                                    <th class="px-4 py-3">{{ __('messages.action') }}</th>
                                </tr>
                            @endif
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse ($services as $service)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            {{ $service->name }}
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-xs">
                                        @switch($service->status)
                                            @case('inactive')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                    {{ __('messages.inactive') }}
                                                </span>
                                            @break

                                            @case('active')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    {{ __('messages.active') }}
                                                </span>
                                            @break
                                        @endswitch

                                    </td>

                                    <td class="px-4 py-3 text-sm">
                                        ${{ $service->price }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <button onclick="confirm('Sure?') || event.stopImmediatePropagation()"
                                            wire:click="deleteService({{ $service->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                            </svg>
                                        </button>
                                        <button wire:click="editService({{ $service->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                    <br><br>
                                    <span class="dark:text-gray-200 p-7">{{ __('messages.no_services') }}</span>
                                    <br><br><br>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $services->links() }}
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="p-4 bg-white dark:bg-gray-700 rounded-2xl shadow-lg">
                            @if ($view == 'new')
                                <span class="text-lg dark:text-gray-200">{{ __('messages.new_service') }}</span>

                                <div class="mt-2 space-y-3 flex flex-col ">
                                    <input wire:model.lazy="name" type="text" placeholder="{{ __('messages.name') }}"
                                        class="input-text dark:text-gray-200 dark:bg-gray-700">
                                    <textarea wire:model.lazy="description" placeholder="{{ __('messages.description') }}"
                                        class="input-text p-3 dark:text-gray-200 dark:bg-gray-700" rows="5"></textarea>
                                    <input wire:model.lazy="price" type="number"
                                        placeholder="{{ __('messages.price') }}"
                                        class="input-text dark:text-gray-200 dark:bg-gray-700">
                                </div>
                                <br>

                                <button wire:click="saveService" class="btn-blue  ">{{ __('messages.save') }}</button>
                            @endif
                            @if ($view == 'edit')
                                <div class="flex">
                                    <span
                                        class="text-lg dark:text-gray-200 dark:bg-gray-700">{{ __('messages.update_service') }}</span>
                                    <svg wire:click="newAgain" xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 text-gray-500 cursor-pointer" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                                    </svg>
                                </div>
                                <div class="mt-2 space-y-3 ">
                                    <input wire:model.lazy="name" type="text" placeholder="{{ __('messages.name') }}"
                                        class="input-text dark:text-gray-200 dark:bg-gray-700">
                                    <textarea wire:model.lazy="description" placeholder="{{ __('messages.description') }}"
                                        class="input-text p-3 dark:text-gray-200 dark:bg-gray-700" rows="5"></textarea>
                                    <input wire:model.lazy="price" type="number"
                                        placeholder="{{ __('messages.price') }}"
                                        class="input-text dark:text-gray-200 dark:bg-gray-700">
                                </div>
                                <div class="flex my-3 space-x-2">
                                    <button wire:click="$set('status','inactive')"
                                        class="@if ($status == 'inactive') btn-red @else btn-gray @endif ">{{ __('messages.inactive') }}</button>
                                    <button wire:click="$set('status','active')"
                                        class="@if ($status == 'active') btn-green @else btn-gray @endif ">{{ __('messages.active') }}</button>
                                </div>
                                <br>
                                <button wire:click="saveService" class="btn-green">{{ __('messages.update') }}</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
