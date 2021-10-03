<div>
    <div>
        @foreach ($notifications as $noti)
            <div class="flex align-items-center mb-6">

                <div class="">
                    <span class="flex">

                        <svg wire:click.prevent="delete({{ $noti->id }})"
                            class="h-6 cursor-pointer shadow-2xl text-gray-400 w-6" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>

                    </span>
                </div>

                <div class="font-weight-bold">
                    <span class="text-dark text-hover-primary mb-1 font-size-lg">{{ $noti->tipo }}</span>
                    <span class="text-muted dark:text-gray-300">{{ $noti->data }}</span>
                </div>

            </div>
        @endforeach
        @if ($notifications->count() > 0)
            <div class="d-flex flex-center py-5">
                <span wire:click.prevent="deleteAll" class="dark:text-gray-300 text-gray-700 border p-3 px-4 cursor-pointer">
                    {{ __('messages.delete_all') }}</span>
            </div>
        @else
            <div class="py-5">
                <span class="font-semibold text-gray-600 dark:text-gray-200 ">{{ __('messages.no_notifications') }}</span>
            </div>
        @endif
    </div>
</div>
