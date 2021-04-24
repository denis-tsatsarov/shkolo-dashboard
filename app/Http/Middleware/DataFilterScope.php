<?php
namespace App\Http\Middleware;

use App\Models\Button;
use App\Scopes\ButtonsDataFilter;
use Closure;

class DataFilterScope
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Button::addGlobalScope(new ButtonsDataFilter());

        return $next($request);
    }
}
