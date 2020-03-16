<?php

namespace App\Http\Middleware;

use Closure;
//use Tymon\JWTAuth\JWTAuth;
//use Tymon\JWTAuth\Http\Facades\BaseMiddleware;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;


class JwtMiddleware extends BaseMiddleware
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
        try {
            //dd($request);
            //dd(response()->json(auth()->user()));
            //$user = auth()->user();
            //dd($user);
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'Token no es valido']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status' => 'Token esta expirado']);
            }else{
                return response()->json(['status' => 'Autorizacion de token no encontrada']);
            }
        }
        return $next($request);
    }
}
