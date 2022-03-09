<?php

namespace App\Http\Middleware;

use Browser;
use Closure;
use App\Models\Stat;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\IpController;

class Stats
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $setting = Setting::first();
        if ($setting->module_stats_system) {
            if (Browser::isBot()) {
                return $next($request);
            }

            $stat = Stat::where('ip', $request->ip())->where('created_at', '>=', now()->subHours(24))->first();
            if ($stat) {
                return $next($request);
            }

            //Save the view
            $view = new Stat();

            if (Browser::isMobile()) {
                $view->dispositive = 'movil';
            }
            if (Browser::isTablet()) {
                $view->dispositive = 'tablet';
            }
            if (Browser::isDesktop()) {
                $view->dispositive = 'pc';
            }
            //SO
            if (Browser::isAndroid()) {
                $view->so = 'android';
            }
            if (Browser::isMac()) {
                $view->so = 'mac';
            }
            if (Browser::isWindows()) {
                $view->so = 'windows';
            }
            if (Browser::isLinux()) {
                $view->so = 'linux';
            }
            //browser
            $view->browser = Browser::browserFamily();
            //country
            $ip = $request->ip();
            $view->country = IpController::getCountry($ip, 'NamE');  //Cu

            //Refer
            $view->refer = $request->server('REQUEST_SCHEME').'://'.$request->server('REMOTE_ADDR').$request->server('REDIRECT_URL');
            $view->ip = $ip;
            $view->save();
        }

        return $next($request);
    }
}
