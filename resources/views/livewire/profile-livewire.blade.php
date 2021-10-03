<div>
    @section('metas')
        <title> {{ __('messages.view_profile') }}</title>
    @endsection
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('messages.edit_profile') }}
        </h2>
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start dark:text-gray-300   sm:pt-5">
            <label for="username" class="block text-sm font-medium  dark:text-gray-300 text-gray-700 sm:mt-px sm:pt-2">
                {{ __('messages.update_avatar') }}
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-lg flex rounded-md shadow-sm">
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="flex items-center">
                            <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                @if ($avatar)
                                    @if ($avatar->temporaryUrl())
                                        <img src="{{ $avatar->temporaryUrl() }}" alt="">
                                    @else
                                        @if ($profile->avatar)
                                            <img src="/$profile->avatar">
                                        @else
                                            <svg class="h-full w-full text-gray-300" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                        @endif
                                    @endif
                                @else
                                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                @endif
                            </span>
                            <button onclick="document.getElementById('file').click();" type="file"
                                class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('messages.change') }}
                            </button>
                            <span wire:loading="avatar" wire:target="avatar"
                                class="text-red-500 ml-5">Cargando...</span>
                            <input wire:model="avatar" type="file" style="display:none;" id="file" name="file" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start   sm:pt-5">
            <label for="password" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 dark:text-gray-300">
                {{ __('messages.pass_old') }}
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-lg flex rounded-md shadow-sm">
                    <input type="password" wire:model.lazy="currentPass"
                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none dark:text-gray-300 dark:bg-gray-700 dark:border-gray-600">
                </div>
            </div>
        </div>
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start   sm:pt-5">
            <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 dark:text-gray-300">
                {{ __('messages.pass_new') }}
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-lg flex rounded-md shadow-sm">
                    <input type="password" wire:model.lazy="newPass"
                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none dark:text-gray-300 dark:bg-gray-700 dark:border-gray-600">
                </div>
                @error('newPass')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <button wire:click="changePass"
                    class="mx-auto inline-flex  dark:text-gray-300 justify-center mt-5 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('messages.change_pass') }}
                </button>
            </div>
        </div>
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start   sm:pt-5">
            <label for="phone" class="block text-sm font-medium  dark:text-gray-300 text-gray-700 sm:mt-px sm:pt-2">
                {{ __('messages.phone') }}
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-lg flex rounded-md shadow-sm">
                    <input type="text" wire:model.lazy="phone"
                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none dark:text-gray-300 dark:bg-gray-700 dark:border-gray-600">
                </div>
            </div>
        </div>
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start   sm:pt-5">
            <label for="email" class="block text-sm font-medium  dark:text-gray-300 text-gray-700 sm:mt-px sm:pt-2">
                Email
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-lg flex rounded-md shadow-sm">
                    <input type="text" wire:model.lazy="email"
                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none dark:text-gray-300 dark:bg-gray-700 dark:border-gray-600">
                </div>
            </div>
        </div>
        <br>
    </div>
</div>
</div>
