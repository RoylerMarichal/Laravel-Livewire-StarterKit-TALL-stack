<div>
    @section('metas')
        <title>{{ __('messages.notifications') }}</title>
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
                            aria-current="page">{{ __('messages.notifications') }}</a>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="relative min-h-screen mt-4 bg-gray-100  dark:bg-gray-800">
            <main class="">
                <div class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 ">
                    <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                        <section aria-labelledby="applicant-information-title">
                            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:px-6

                                ">
                                    <livewire:notifications-livewire />
                                </div>
                        </section>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
