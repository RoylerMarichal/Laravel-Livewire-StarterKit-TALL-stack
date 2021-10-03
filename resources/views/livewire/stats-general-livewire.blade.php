<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <!-- Charts -->
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
       @if($months>1)
         {{__('messages.performance')}}  {{$months}}  {{__('messages.mounths')}}
        @else
        {{__('messages.performance')}}  {{$months}}  {{__('messages.mounths')}}
        @endif
    </h2>

    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                {{__('messages.impressions')}} /  {{__('messages.users')}}
            </h4>
            <canvas id="line"></canvas>
            <div
                class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                <!-- Chart legend -->
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                    <span>  {{__('messages.impressions')}}</span>
                </div>
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                    <span> {{__('messages.users')}}</span>
                </div>
            </div>
        </div>
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                {{__('messages.dispositives')}}
            </h4>
            <canvas id="pie"></canvas>
            <div
                class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                <!-- Chart legend -->
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
                    <span>Móvil</span>
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
       var users = @json($users);
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
                       label: 'Users',
                       fill: false,
                       /**
                        * These colors come from Tailwind CSS palette
                        * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
                        */
                       backgroundColor: '#7e3af2',
                       borderColor: '#7e3af2',
                       data: users,
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
