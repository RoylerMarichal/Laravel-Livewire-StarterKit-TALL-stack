<div>
    @section('metas')
        <title>{{ __('messages.orders') }}</title>
    @endsection
    <div class="container px-6 mt-2 py-6 pb-5 mx-auto ">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-4">

                <li>
                    <div class="flex items-center">
                        <!-- Heroicon name: solid/chevron-right -->
                        <a href="{{ route('home') }}"
                            class="ml-4 dark:hover:text-gray-200 text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('messages.home') }}</a>
                    </div>
                </li>

                <li>
                    <div class="flex items-center">
                        <!-- Heroicon name: solid/chevron-right -->
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <a href="#"
                            class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700 dark:hover:text-gray-200"
                            aria-current="page">{{ __('messages.orders') }}</a>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mt-6 ">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('messages.orders') }}
            </h2>
            <div class="w-full col-span-1 overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        @if ($orders->count() > 0)
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
                        @forelse ($orders as $order)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        {{ $order->name }}
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-xs">
                                    @switch($order->status)
                                        @case('pending')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                {{ __('messages.pending') }}
                                            </span>
                                        @break
                                        @case('complete')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                {{ __('messages.completed') }}
                                            </span>
                                        @break
                                        @case('paid')
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            {{ __('messages.paid') }}
                                        </span>
                                    @break
                                    @endswitch

                                </td>

                                <td class="px-4 py-3 text-sm">
                                    ${{ $order->price }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <button onclick="confirm('Sure?') || event.stopImmediatePropagation()"
                                        wire:click="deleteOrder({{ $order->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                        </svg>
                                    </button>
                                    <a href="{{route('view_invoice',$order->invoice->id)}}">  <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                          </svg>
                                    </button></a>
                                    <button wire:click="completeOrder({{$order->id}})" onclick="confirm('It is sure that the order was completed?') || event.stopImmediatePropagation()" >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                          </svg>
                                    </button>

                                </td>
                            </tr>
                        @empty
                            <br><br>
                            <span class="dark:text-gray-200 p-7">{{ __('messages.no_order') }}</span>
                            <br><br><br>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
</div>
