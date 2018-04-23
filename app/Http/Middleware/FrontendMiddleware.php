<?php

namespace App\Http\Middleware;

use App\Models\Menu;
use App\Models\Setting;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class FrontendMiddleware
{
    public function handle($request, Closure $next)
    {
        view()->share([
            'lang'=>App::getLocale(),
        ]);
        return $next($request);
    }
}
