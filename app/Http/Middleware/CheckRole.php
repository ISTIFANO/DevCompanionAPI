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

if(Auth::user()->role->role_name == 'Admin'){

    return response()->json(['message' => 'Acces non autorise Admin.']);
}
// }else if(!$user || $user->role || $user->role->role_name !== 'Participant'){

//     return response()->json(['message' => 'Acces non autorise pour Participant .']);

// }


}catch(Exception $e){

    return response()->json(["message"=>$e]);


}


        return $next($request);
    }
}
