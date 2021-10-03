<div>
    <div class="bg-white dark:bg-gray-700 dark:text-gray-300 m-0 shadow  sm:rounded-md">
        <div class="flex w-100 flex-col justify-content-between">
            <h3 class="text-lg p-5 font-medium">
                {{ __('messages.tickets_suports') }}
            </h3>
            @if ($view !== 'new')
                <button wire:click="$set('view','new')" type="button"
                    class="cursor-pointer dark:bg-gray-700 dark:text-gray-300 m-2 ml-5 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('messages.open_new') }}
                </button>
            @endif
            @if ($view == 'new' || $view == 'messages')
                <button wire:click="$set('view','tickets')" type="button"
                    class="cursor-pointer dark:bg-gray-700 dark:text-gray-300 m-2 ml-5 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('messages.view_all') }}
                </button>
            @endif
        </div>

        @if ($view === 'new')

            <div class="space-y-8 divide-y divide-gray-200 p-5">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div>
                        <div>
                            <h3
                                class="text-lg leading-6  dark:bg-gray-700 dark:text-gray-300 font-medium text-gray-900">
                                {{ __('messages.new_ticket') }}
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm dark:bg-gray-700 dark:text-gray-300 text-gray-500">
                                {{ __('messages.new_ticket_p1') }}
                            </p>
                        </div>

                        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="username"
                                    class="block  dark:bg-gray-700 dark:text-gray-300 text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    {{ __('messages.subjet') }}
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="max-w-lg flex rounded-md shadow-sm">
                                        <input type="text" wire:model.lazy="subjet"
                                            class="flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                    </div>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="about"
                                    class="block dark:bg-gray-700 dark:text-gray-300 text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    {{ __('messages.description') }}
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <textarea wire:model.lazy="description" rows="3"
                                        class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <button wire:click="send"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('messages.send') }}
                        </button>
                    </div>
                </div>
            </div>

        @endif
        @if ($view === 'tickets')
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <ul class="divide-y divide-gray-200">
                    @foreach ($tickets as $ticket)
                        <li>
                            <a wire:click="viewTicket({{ $ticket->id }})"
                                class="block cursor-pointer hover:bg-gray-50">
                                <div class="flex items-center px-4 py-4 sm:px-6">
                                    <div class="min-w-0 flex-1 flex items-center">
                                        @if ($ticket->admin)
                                            <div class="flex-shrink-0">
                                                <img class="h-12 w-12 rounded-full"
                                                    src="{{ $ticket->admin->user->avatar ?? '/assets/img/avatar.png' }}"
                                                    alt="">
                                            </div>
                                        @endif
                                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                            @if ($ticket->admin)
                                                <div>
                                                    <p class="text-sm font-medium text-indigo-600 truncate">
                                                        {{ $ticket->admin->user->name }}</p>
                                                    <p class="mt-2 flex items-center text-sm text-gray-500">

                                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path
                                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                            <path
                                                                d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                        </svg>
                                                        <span
                                                            class="truncate">{{ $ticket->admin->user->email }}</span>
                                                    </p>
                                                </div>
                                            @endif
                                            <div class=" md:block">
                                                <div>
                                                    <p class="text-sm text-gray-900">
                                                        {{ Str::limit($ticket->subjet, 77) }}
                                                    </p>
                                                    @if ($ticket->status == 'open')
                                                        <p class="mt-2 flex items-center text-sm text-gray-500">

                                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            {{ __('messages.open') }}
                                                        </p>
                                                    @endif
                                                    @if ($ticket->status == 'closed')
                                                        <p class="mt-2 flex items-center text-sm text-gray-500">

                                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-red-400"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            {{ __('messages.closed') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @if ($tickets->count() == 0)
                <br>

                <span class="p-10 pb-10">  {{ __('messages.no_tickets') }}</span>
                <br> <br>
            @endif
        @endif
        @if ($view === 'messages')
            <section>
                <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden">
                    <div class="divide-y divide-gray-200">
                        <div class="px-4 py-5 sm:px-6">
                            <h2 id="notes-title" class="text-lg font-medium text-gray-900">Ticket:
                                {{ $ticket->subjet }}
                            </h2>
                            @if ($ticket->status == 'open')
                                <button wire:click="close" type="button"
                                    class="cursor-pointer m-2 ml-5 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('messages.close') }}
                                </button>
                            @endif
                        </div>
                        <div class="px-4 py-6 sm:px-6">
                            <ul class="space-y-8">
                                @foreach ($messages as $message)
                                    <li>
                                        <div class="flex space-x-3">
                                            <div class="flex-shrink-0">
                                                @if ($message->via == 'client')
                                                    <img class="h-10 w-10 rounded-full"
                                                        src="{{ $ticket->user->avatar }}">
                                                @endif
                                                @if ($message->via == 'platform')
                                                    <img class="h-10 w-10 rounded-full"
                                                        src="{{ $ticket->admin->user->avatar }}">
                                                @endif
                                            </div>
                                            <div>
                                                @if ($message->via == 'client')
                                                    <div class="text-sm">
                                                        <a href="#"
                                                            class="font-medium text-gray-900">{{ $ticket->user->name }}</a>
                                                    </div>
                                                @endif
                                                @if ($message->via == 'platform')
                                                    <div class="text-sm">
                                                        <a href="#"
                                                            class="font-medium text-gray-900">{{ $ticket->admin->user->name }}</a>
                                                    </div>
                                                @endif
                                                <div class="mt-1 text-sm text-gray-700">
                                                    <p>{{ $message->description }}</p>
                                                </div>
                                                <div class="mt-2 text-sm space-x-2">
                                                    <span
                                                        class="text-gray-500 font-medium">{{ $message->created_at->diffForHumans() }}</span>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-6 sm:px-6">
                        <div class="flex space-x-3">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->avatar }}">
                            </div>
                            <div class="min-w-0 flex-1">
                                @if ($ticket->status == 'open')
                                    <div>
                                        <div>
                                            <label for="comment" class="sr-only">About</label>
                                            <textarea wire:model.lazy="comment" rows="3"
                                                class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border border-gray-300 rounded-md"
                                                placeholder="Responde"></textarea>
                                        </div>
                                        <div class="mt-3 flex items-center justify-between">

                                            <button wire:click="newReply"
                                                class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                {{ __('messages.repply') }}
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>
</div>
