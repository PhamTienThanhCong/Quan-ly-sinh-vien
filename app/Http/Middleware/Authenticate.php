<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // get the current route name
            $routeName = $request->route()->getName();
            // check if the current route name is admin
            if(strpos($routeName, 'admin') !== false){
                return route('admin.login');
            }else{
                return route('student.login');
            }
        }
    }
}
