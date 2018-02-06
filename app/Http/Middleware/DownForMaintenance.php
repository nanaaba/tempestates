<?php

namespace App\Http\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Closure;

class DownForMaintenance
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
    throw new HttpException(503);
    }
}
