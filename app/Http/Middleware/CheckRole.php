<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next ): Response
    {
try{
// $user = Auth::user();

if(auth()->user()->role->role_name != 'admin'){
    return response()->json([
        'message' => '404',
        'status' => 404
    ]);

    // return response()->json(['message' => 'Acces non autorise Admin.']);
}
return $next($request);



}catch(Exception $e){

    return response()->json(["message"=>$e]);


}


        return $next($request);
    }
}
