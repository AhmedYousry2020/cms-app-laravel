<?php

namespace App\Http\Middleware;

use Closure;
use App\categories;
class checkCategory
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
        $count = categories::all()->count();
        if( $count == 0){
        
     session()->flash("error","you need to add some category first");
       return redirect("categories");
        
    }
        return $next($request);
    }
}
