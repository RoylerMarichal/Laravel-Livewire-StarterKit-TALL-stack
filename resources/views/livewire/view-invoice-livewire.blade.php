<div>
    @section('metas')
        <title>{{ __('messages.view_invoice') }}</title>
    @endsection
    <style>
        .StripeElement {
            background-color: white;
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

    </style>
    <div class="container px-6 mt-2 py-6 pb-5 mx-auto grid">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-4">
                <li>
                    <div class="flex items-center">
                        <a href="{{ route('agency_invoices') }}"
                            class="ml-4 dark:hover:text-gray-200 text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('messages.invoices') }}</a>
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
                            aria-current="page">{{ __('messages.view_invoice') }}</a>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="relative min-h-screen mt-4 bg-gray-100  dark:bg-gray-800">
            <main class="">
                <div
                    class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
                    <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                        <section aria-labelledby="applicant-information-title">
                            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:px-6">
                                    <h2 id="applicant-information-title"
                                        class="text-lg leading-6 font-medium text-gray-700 dark:text-gray-200   hover:text-gray-900">
                                        {{ __('messages.invoice_details') }}
                                    </h2>
                                    <p class="mt-1 max-w-2xl text-sm text-gray-500  dark:text-gray-300">
                                        {{ __('messages.details_order') }} {{ $invoice->invoice_id }}
                                    </p>
                                    <div class="py-2">
                                        @switch($invoice->status)
                                            @case('pending')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                    {{ __('messages.pending') }}
                                                </span>
                                            @break
                                            @case('active')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    {{ __('messages.active') }}
                                                </span>
                                            @break
                                            @case('complete')
                                                <span
                                                    class="px-2 py-1  font-semibold leading-tight text-blue-700 bg-blue-500 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                                    {{ __('messages.completed') }}
                                                </span>
                                            @break
                                            @case('inactive')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                    {{ __('messages.inactive') }}
                                                </span>
                                            @break
                                            @default

                                        @endswitch
                                    </div>
                                </div>
                                <div class="border-t  border-gray-200 px-4 py-5 sm:px-6">
                                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                                {{ __('messages.client') }}
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-300 ">
                                                {{ $invoice->user->name }}
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt
                                                class="text-sm font-medium text-gray-500 dark:text-gray-300 dark:text-gray-300">
                                                {{ __('messages.email_client') }}
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-300">
                                                {{ $invoice->user->email }}
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt
                                                class="text-sm font-medium text-gray-500 dark:text-gray-300 dark:text-gray-300">
                                                {{ __('messages.due') }}
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-300">
                                                $ {{ $invoice->value }}
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt
                                                class="text-sm font-medium text-gray-500 dark:text-gray-300 dark:text-gray-300">
                                                {{ __('messages.phone_client') }}
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-300">
                                                {{ $invoice->user->phone }}
                                            </dd>
                                        </div>

                                        @if ($invoice->order)
                                            <div class="p-3">
                                                {{ __('messages.order') }} : {{ $invoice->order->id }} -
                                                {{ $invoice->order->name }}
                                            </div>
                                        @endif

                                    </dl>
                                </div>

                            </div>
                        </section>
                    </div>
                    <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
                        <div class="bg-white dark:bg-gray-700 px-4 py-5 shadow sm:rounded-lg sm:px-6">
                            <h2 id="timeline-title" class="text-lg font-medium dark:text-gray-200 text-gray-900">
                                {{ __('messages.payments') }}</h2>
                            <div class="mt-6 flow-root">
                                <ul class="">
                                    @if ($invoice->status == 'pending' || $invoice->status == 'inpaid')

                                        @if (Auth::user()->id == $invoice->user_id)
                                            <div class="mt-6 flex flex-col justify-stretch">
                                                @if ($setting->qvapay)
                                                    <button wire:click="payWithQvaPay" type="button"
                                                        class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 dark:bg-blue-100 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                        {{ __('messages.payments_to_qvapay') }}
                                                    </button>
                                                @endif
                                                @if ($setting->manual)
                                                    <button wire:click="payWithManual" type="button"
                                                        class="inline-flex items-center justify-center mt-3 px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 dark:bg-blue-100 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                        {{ __('messages.pay_manually') }}
                                                    </button>
                                                @endif
                                                @if ($setting->enzona)
                                                    <button wire:click="payWithEnzona" type="button"
                                                        class="inline-flex items-center justify-center mt-3 px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 dark:bg-blue-100 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                        {{ __('messages.pay_enzona') }}
                                                    </button>
                                                @endif
                                                @if ($setting->stripe)
                                                    <button wire:click="payWithStripe" type="button"
                                                        class="inline-flex items-center justify-center mt-3 px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 dark:bg-blue-100 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                        {{ __('messages.pay_stripe') }}
                                                    </button>

                                                @endif
                                                @if ($viewStripe)
                                                    <form method="post" id="payment-form">
                                                        @csrf
                                                        <div class="form-row my-2">
                                                            <label for="card-element">
                                                                {{ __('messages.cards') }}</label>
                                                            <div id="card-element">
                                                            </div>
                                                            <div id="card-errors"></div>
                                                        </div>
                                                        <button class="btn-blue">
                                                            {{ __('messages.pay') }}</button>
                                                    </form>

                                                @endif
                                                @if ($viewManual)
                                                    <div class="p-3">
                                                        {{ __('messages.send') }} ${{ $invoice->value }}
                                                        {{ $setting->currency }}
                                                        {{ __('messages.to') }}
                                                        <div class="dark:text-gray-300">
                                                            {{ $setting->card_manual }}
                                                        </div>
                                                    </div>
                                                    <div class="p-3">
                                                        {{ __('messages.note') }}: <div class="dark:text-gray-300">
                                                            {{ $setting->card_manual_info }}</div>
                                                    </div>
                                                    @if (!$invoice->payment_image)
                                                        <div
                                                            class="sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">

                                                            <button onclick="document.getElementById('file').click();"
                                                                type="button"
                                                                class="relative mt-3 block w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="mx-auto h-10 w-10 text-gray-400" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                </svg>
                                                                <span
                                                                    class="mt-2 block text-sm font-medium text-gray-900 dark:text-gray-300">
                                                                    {{ __('messages.payment_image') }}
                                                                </span>
                                                            </button>

                                                            <span wire:loading="paymentImage" wire:target="paymentImage"
                                                                class="text-red-500 ml-5">{{ __('messages.loading') }}...</span>
                                                        </div>
                                                        <input wire:model="paymentImage" type="file"
                                                            style="display:none;" id="file" name="file" />
                                                    @endif
                                            </div>
                                        @endif

                                    @endif
                                    @endif
                                    @if (($invoice->payment_image && $invoice->status == 'pending') || $invoice->status == 'inpaid')
                                        <a target="_blank" href="{{ $invoice->payment_image }}">
                                            <img src="{{ $invoice->payment_image }}"
                                                class="rounded-2xl shadow-2xl w-100 my-1 h-auto">
                                            <span class="dark:text-gray-300"> {{ __('messages.payment_image') }}
                                            </span>
                                        </a>
                                        <button wire:click="deletePaymenImage">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 shadow-2xl rounded-2xl" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                            </svg>
                                        </button>
                                        @if (Auth::user()->adminOrStaff())
                                            <div class="flex">
                                                <button wire:click="proccesPayment" type="button"
                                                    class="mt-6  inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 dark:bg-blue-100 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    {{ __('messages.mark_as_paid') }}
                                                </button>
                                                <button wire:click="removePaymentImage" type="button"
                                                    class="mt-6 mx-3  inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 dark:bg-red-100 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    {{ __('messages.refuse') }}
                                                </button>
                                            </div>
                                        @endif
                                    @endif
                                    @if ($invoice->status == 'paid')
                                        <li>
                                            <div class="relative pb-8">
                                                <span
                                                    class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200 dark:bg-gray-600"
                                                    aria-hidden="true"></span>
                                                <div class="relative dark:bg-gray-600 flex space-x-3">
                                                    <div>
                                                        <span
                                                            class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                                            <svg class="w-6 h-6 text-white"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                        <div>
                                                            <p class="text-sm dark:text-gray-200 text-gray-500">
                                                                {{ __('messages.payment_completed') }}</p>
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>

    </div>
    @if ($viewStripe)
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            // Stripe API Key
            var stripe = Stripe(
                '{{ $setting->stripe_app_key }}'
            );
            var elements = stripe.elements();
            // Custom Styling
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '24px',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };
            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style
            });
            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        stripeTokenHandler(result.token);
                    }
                });
            });
            // Send Stripe Token to Server
            function stripeTokenHandler(token) {
                Livewire.emit('paymenetSucceful', token.id);
            }
        </script>

    @endif

</div>
