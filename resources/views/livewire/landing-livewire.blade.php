<div>
    @section('metas')
        <title>{{$setting->app_name}}</title>
    @endsection
    <div x-data="{buyService:false}">
        <div id="main">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="mt-16 mb-7 mx-auto max-w-7xl px-4 sm:mt-24 sm:px-6">
                    <div class="text-center">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block text-indigo-600">{{ $setting->title_one }}</span>
                        </h1>
                        <p
                            class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                            {{ $setting->subtitle_one }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="services" class="bg-gray-100">
            <div class="pt-12 sm:pt-16 lg:pt-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl lg:text-5xl">
                            {{ __('messages.our_services') }}
                        </h2>
                    </div>
                </div>
            </div>
            <div id="services">
                <livewire:buy-services-livewire />
            </div>
        </div>
    </div>
</div>
