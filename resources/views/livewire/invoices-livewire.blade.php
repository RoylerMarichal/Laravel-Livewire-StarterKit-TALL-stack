<div>
    @section('metas')
        <title> {{ __('messages.invoices') }}</title>
    @endsection
    <div class="container px-6 mt-2 py-6 pb-5 mx-auto grid">
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
                            aria-current="page">{{ __('messages.invoices') }}</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('messages.invoices') }} @switch($status)
                @case('paid')
                    {{ __('messages.paid') }}
                @break
                @case('pending')
                    {{ __('messages.pending') }}
                @break
                @case('expired')
                    {{ __('messages.expireds') }}
                @break
                @case('inpaid')
                    {{ __('messages.inpaid') }}
                @break
            @endswitch
        </h2>

        <div class="flex text-md  flex-wrap my-3 ">
            <button wire:click="$set('status','paid')" class="btn-blue "> {{ __('messages.view_paid') }} </button>
            <button wire:click="$set('status','pending')"
                class="btn-yellow mx-2">{{ __('messages.view_pending') }}</button>
        </div>
        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        @if ($invoices->count() > 0)
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                @if (Auth::user()->staff || Auth::user()->admin)
                                    <th class="px-4 py-3">{{ __('messages.client') }}</th>
                                @endif
                                <th class="px-4 py-3">{{ __('messages.status') }}</th>
                                <th class="px-4 py-3">{{ __('messages.value') }}</th>
                                <th class="px-4 py-3">{{ __('messages.action') }}</th>
                            </tr>
                        @endif
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($invoices as $invoice)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        {{ $invoice->user->name }}
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-xs">
                                    @switch($invoice->status)
                                        @case('pending')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                {{ __('messages.pending') }}
                                            </span>
                                        @break
                                        @case('paid')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                {{ __('messages.paid') }}
                                            </span>
                                        @break
                                        @case('expired')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                {{ __('messages.expireds') }}
                                            </span>
                                        @break
                                        @default

                                    @endswitch

                                </td>

                                <td class="px-4 py-3 text-sm">

                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <a href="{{ route('view_invoice', $invoice->id) }}">
                                        <button
                                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 dark:text-gray-200 dark:bg-gray-700 focus:outline-none focus:shadow-outline-purple">
                                            {{ __('messages.details') }}
                                        </button></a>
                                </td>
                            </tr>
                            @empty
                                <br><br>
                                <span class="dark:text-gray-200 p-7">{{ __('messages.no_invoices') }}</span>
                                <br><br><br>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $invoices->links() }}
                </div>
            </div>
        </div>
        </main>
    </div>
