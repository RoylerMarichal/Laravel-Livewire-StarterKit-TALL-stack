@section('metas')
    <title>{{ __('messages.login') }} </title>
@endsection

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="/">
            <img class="mx-auto shadow-lg rounded-b-3xl" style="width: 277px;height: auto;" src="{{App\Models\Setting::first()->logo}}" alt="Logo de {{config('app.name')}}">
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            {{ __('messages.login') }}
        </h2>
        @if (Route::has('register'))
            <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
                Or
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    {{ __('messages.new_account') }}
                </a>
            </p>
        @endif
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="authenticate">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                        Email
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" name="email" type="email" required autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                        {{ __('messages.pass') }}
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input wire:model.lazy="remember" id="remember" type="checkbox" class="form-checkbox w-4 h-4 text-indigo-600 transition duration-150 ease-in-out" />
                        <label for="remember" class="block ml-2 text-sm text-gray-900 leading-5">
                            {{ __('messages.remember') }}
                        </label>
                    </div>

                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            {{ __('messages.forget') }}
                        </a>
                    </div>
                </div>

                @if (config('captcha.sitekey') && config('captcha.secret'))
                    <div class="flex items-center justify-center mt-6">
                        <div class="flex items-center">
                            <div class="g-recaptcha" data-sitekey="{{ config('captcha.sitekey') }}" data-callback="reCaptchaCallback" wire:ignore></div>
                        </div>
                    </div>
                    @error('recaptcha')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                @endif

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            {{__('messages.access')}}
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
    @if (config('captcha.sitekey') && config('captcha.secret'))
        <script>
            function reCaptchaCallback(response) {
                 @this.set('recaptcha', response);
            }
        </script>
    @endif
@endsection
