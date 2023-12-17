<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!auth()->user()->hasRole($role)) {
            $this->unauthorized($request, $role);
        }

        return $next($request);
    }
    protected function unauthorized($request, $role)
    {
        throw new HttpException(403, 'No tienes permisos para acceder a esta ruta.');
    }
}
