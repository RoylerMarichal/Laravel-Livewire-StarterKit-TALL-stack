<div>

     <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        @if($months>1)
        {{ __('messages.performance') }}  {{ __('messages.of') }} {{$months + 1}}  {{ __('messages.mounths') }}
         @else
         {{ __('messages.performance') }}  {{ __('messages.of') }} {{$months}}  {{ __('messages.month') }}
         @endif
     </h2>
     <div class="grid gap-6 mb-8 md:grid-cols-3 xl:grid-cols-3">
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div
                class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                  </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    {{ __('messages.total_impressions') }}
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  {{$campain->impressions_obtained}}
                </p>
            </div>
        </div>

        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div
                class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                  </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    {{ __('messages.total_clicks') }}
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$campain->clicks_obtained}}
                </p>
            </div>
        </div>

        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div
                class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 5c7.18 0 13 5.82 13 13M6 11a7 7 0 017 7m-6 0a1 1 0 11-2 0 1 1 0 012 0z" />
                  </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    CTR
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    @if($campain->impressions_obtained>0)  {{ number_format($campain->clicks_obtained  / $campain->impressions_obtained  * 100,2)}} % @else 0% @endif
                </p>
            </div>
        </div>
    </div>
     <div class="flex flex-1 space-y-1 my-3">
         {{-- <button wire:click="changeMonths(1)" class="mx-1 block bg-gray-200 dark:bg-gray-700 text-sm font-medium hover:opacity-90 text-gray-500 dark:text-gray-300 text-center px-4 py-4 hover:text-gray-700   dark:hover:text-gray-200 sm:rounded-b-lg">1 mes</button>
         <button wire:click="changeMonths(3)" class="mx-1 block bg-gray-200 dark:bg-gray-700 text-sm font-medium hover:opacity-90 text-gray-500 dark:text-gray-300 text-center px-4 py-4 hover:text-gray-700   dark:hover:text-gray-200 sm:rounded-b-lg">3 mes</button>
         <button wire:click="changeMonths(6)" class="mx-1 block bg-gray-200 dark:bg-gray-700 text-sm font-medium hover:opacity-90 text-gray-500 dark:text-gray-300 text-center px-4 py-4 hover:text-gray-700   dark:hover:text-gray-200 sm:rounded-b-lg">6 mes</button>
         <button wire:click="changeMonths(12)" class="mx-1 block bg-gray-200 dark:bg-gray-700 text-sm font-medium hover:opacity-90 text-gray-500 dark:text-gray-300 text-center px-4 py-4 hover:text-gray-700   dark:hover:text-gray-200 sm:rounded-b-lg">12 mes</button> --}}
     </div>
     <div class="grid gap-6 mb-8 md:grid-cols-2">
         <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
             <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                 Impresiones / clicks
             </h4>
             <canvas id="line"></canvas>
             <div
                 class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                 <!-- Chart legend -->
                 <div class="flex items-center">
                     <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                     <span>Impresiones</span>
                 </div>
                 <div class="flex items-center">
                     <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                     <span>Click</span>
                 </div>
             </div>
         </div>
         <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
             <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                {{ __('messages.by_defauld') }}
             </h4>
             <canvas id="pie"></canvas>
             <div
                 class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                 <!-- Chart legend -->
                 <div class="flex items-center">
                     <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
                     <span> {{ __('messages.movil') }}</span>
                 </div>
                 <div class="flex items-center">
                     <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                     <span>PC</span>
                 </div>
                 <div class="flex items-center">
                     <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                     <span>Tablet</span>
                 </div>
             </div>
         </div>
     </div>



    <script>
        var labels = @json($labels);
        var impressions = @json($impressions);
        var clicks = @json($clicks);
        var pcs = @json($pcs);
        var movils = @json($movils);
        var tablets = @json($tablets);
        /**
         * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
         */

        const lineConfig = {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                        label: 'Impresiones',
                        /**
                         * These colors come from Tailwind CSS palette
                         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
                         */
                        backgroundColor: '#0694a2',
                        borderColor: '#0694a2',
                        data: impressions,
                        fill: false,
                    },
                    {
                        label: 'Clicks',
                        fill: false,
                        /**
                         * These colors come from Tailwind CSS palette
                         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
                         */
                        backgroundColor: '#7e3af2',
                        borderColor: '#7e3af2',
                        data: clicks,
                    },
                ],
            },
            options: {
                responsive: true,
                /**
                 * Default legends are ugly and impossible to style.
                 * See examples in charts.html to add your own legends
                 *  */
                legend: {
                    display: false,
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true,
                },
                scales: {
                    x: {
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month',
                        },
                    },
                    y: {
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value',
                        },
                    },
                },
            },
        }

        // change this to the id of your chart element in HMTL
        const lineCtx = document.getElementById('line')
        window.myLine = new Chart(lineCtx, lineConfig)

        /**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */

const pieConfig = {
  type: 'doughnut',
  data: {
    datasets: [
      {
        data: [movils, pcs, tablets],
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         */
        backgroundColor: ['#0694a2', '#1c64f2', '#7e3af2'],
        label: 'Dataset 1',
      },
    ],
    labels: ['Móvil', 'PC', 'Tablet'],
  },
  options: {
    responsive: true,
    cutoutPercentage: 80,
    /**
     * Default legends are ugly and impossible to style.
     * See examples in charts.html to add your own legends
     *  */
    legend: {
      display: false,
    },
  },
}

// change this to the id of your chart element in HMTL
const pieCtx = document.getElementById('pie')
window.myPie = new Chart(pieCtx, pieConfig)

    </script>


</div>
