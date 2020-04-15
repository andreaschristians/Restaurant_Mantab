<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotEmployee
{
    public function handle($request, Closure $next, $guard="employee")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect(route('employee.signin'));
        }
        return $next($request);
    }
}
?>