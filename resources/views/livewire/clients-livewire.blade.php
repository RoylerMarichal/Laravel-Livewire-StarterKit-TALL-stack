<div>
    @section('metas')
        <title> {{ __('messages.clients') }}</title>
    @endsection

    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('messages.clients') }}
        </h2>
        <input type="text" wire:model="search" placeholder="    {{ __('messages.search_clients') }}"
            class="block w-full my-3 text-sm focus:border-purple-400 focus:outline-none dark:text-gray-300 dark:bg-gray-700 dark:border-gray-600">
        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3"> {{ __('messages.name') }}</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3"> {{ __('messages.phone') }}</th>
                            <th class="px-4 py-3">{{ __('messages.company') }}</th>
                            <th class="px-4 py-3">{{ __('messages.action') }}</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($users as $user)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="{{ $user->avatar }}" alt="{{ $user->name }}" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">{{ $user->name }}</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-xs">
                                    <span>
                                        {{ $user->email }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->phone }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->business }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <button wire:click="login({{ $user->id }})"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 dark:text-gray-200 dark:bg-gray-700 focus:outline-none focus:shadow-outline-purple">
                                        Login as
                                    </button>
                                    <a href="{{ route('profile', $user->id) }}">
                                        <button
                                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 dark:text-gray-200 dark:bg-gray-700 focus:outline-none focus:shadow-outline-purple">
                                            {{ __('messages.edit') }}
                                        </button></a>
                                </td>
                            </tr>
                        @empty
                            <span class="p-7 m-7"> {{ __('messages.no_result') }}</span>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
    </main>
</div>
