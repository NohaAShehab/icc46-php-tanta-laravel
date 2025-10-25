<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ValiDMinThreeCharString
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if($request->has("name")){
           $name = $request->get("name");
           $validator = Validator::make($request->all(),
               [
              "name"=> "min:3"
           ],
           [
               "name.min"=>"from middleware, name must be at least 3 characters"
           ]
           );
           // if condition not applied ? $validator --> fails
            if($validator->fails()){
                return redirect()
                    -> back()
                    ->withErrors($validator)
                    ->withInput();
            }

        }
        return $next($request);
    }
}
