<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class RolesAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // get user roles
        $roles = auth()->user()->roles;

        if(auth()->user()->id == 1){
            return $next($request);
        }

        // get requested action
        $actionName = class_basename($request->route()->getActionname());

        foreach ($roles as $key => $role) {
            
            $modules = $role->modules;

            // check if requested action is in modules list
            foreach ($modules as $module)
            {
                if(!empty($module->controller)){
                    $_namespaces_chunks = explode('\\', $actionName);
                    $namespace = end($_namespaces_chunks);
                    $controller = explode('@', $namespace);

                    if (reset($controller) == $module->controller)
                    {
                      // authorized request
                      return $next($request);
                    }
                }
            }
        }
        // none authorized request
        return abort(403);
    }
}
