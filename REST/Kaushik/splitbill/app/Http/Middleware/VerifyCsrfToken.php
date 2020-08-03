<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/v1/register/signup/',
        '/v1/register/signup/*',
        '/v1/auth/login/',
        '/v1/auth/login/*',
        '/v1/bill/',
        '/v1/bill/*',
    ];
}
