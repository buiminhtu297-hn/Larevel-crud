<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WriteUrlToLog
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
        $url = $request->path();
        $request_params = json_encode($request->all());
        $status = http_response_code();
        $ip = $request->ip();
        $user_agent = $request->userAgent();
        $action = "URL:".$url .",\t Request params:". $request_params .",\t Status:". $status .",\t IP:". $ip .
        ",\t User-Agent:".$user_agent;
        Log::channel("action")->info($action);
        return $next($request);
    }


}
