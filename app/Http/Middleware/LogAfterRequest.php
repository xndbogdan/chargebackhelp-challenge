<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Log;
use App\Helpers\IntegrationLogger;

class LogAfterRequest {

    public function handle($request, \Closure  $next) {
        $startTime = microtime(true);

        $route = explode('/', $request->path())[0];

        // Use Spatie's Ray app to get logs
        ray([
          'route' => $route,
          'from' => $request->ip(),
          'params' => $request->all(),
          'headers' => $request->headers->all(),
        ]);

        $response = $next($request);

        return $this->end($request, $response, $startTime);

    }

    public function end($request, $response, $startTime) {
        $route = explode('/', $request->path())[0];
        $executionEndTime = microtime(true);

        // Use Spatie's Ray app to get logs
        ray([
          'route' => $route,
          'to' => $request->ip(),
          'params' => $request->all(),
          'response' => $response,
          'headers' => $request->headers->all(),
          'executionTime' => $executionEndTime - $startTime,
        ]);
        return $response;
    }

}