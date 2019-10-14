<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;

class CategoryMiddleware
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
        if(!$request->session()->exists('categories')){

            $categories = Category::all();
            $request->session()->put('categories', $categories);
        }


        return $next($request);
    }
}
