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
    public function handle(Request $request, Closure $next ,$role): Response
    {
try{
$user = Auth::user();

if(!$user || $user->role || $user->role->role_name !== $role){

    return response()->json(['message' => 'Acces non autorise.']);

}


}catch(Exception $e){

    return response()->json(["message"=>$e]);


}


        return $next($request);
    }
}
