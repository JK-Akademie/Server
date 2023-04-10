<?php

namespace App\Http\Middleware;

use App\Traits\API\ApiResponse;
use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerified
{
    use ApiResponse;

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || ($request->user() instanceof MustVerifyEmail && ! $request->user()->hasVerifiedEmail())) {
            return $this->conflictResponse(trans('Your email address is not verified.'));
        }

        return $next($request);
    }
}
