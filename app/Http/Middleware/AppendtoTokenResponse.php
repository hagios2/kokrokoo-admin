<?php

namespace App\Http\Middleware;

use Closure;

class AppendtoTokenResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response =  $next($request);

        $content = json_decode($response->content(), true);

        if (!empty($content['access_token'])) {

            $content['status'] = 'success';

            $response->setContent($content);

        }

        return $response;
    }
}
