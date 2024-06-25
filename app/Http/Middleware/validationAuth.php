<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class validationAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try{

            //validation
            $request->validate(array_merge(
                [
                    'email' => ['required', 'email'],
                    'password' => ['required', 'string', 'max:15', 'min:8'],
                ], 
                //if register validate name
                $request->route()->getName() == 'register.Function' ? [
                    'name' => ['required', 'string', 'max:30', 'min:5']
                ] : []
            ));

            return $next($request);

        }catch(ValidationException $e){
            return back()->withErrors($e->validator->errors());
        }
    }
}
