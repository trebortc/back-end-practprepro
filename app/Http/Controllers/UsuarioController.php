<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class UsuarioController extends Controller
{
    /*/**
     * Create a new UsuarioController instance.

     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signup']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];
        $rol = $request['rol'];
        $credentials = ['email'=>$email, 'password'=>$password, 'rol'=>$rol ];
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Email, password o rol no existe'], 401);
        }
        return $this->respondWithToken($token);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signup(Request $request)
    {
        $usuario = new User();
        //dd($usu
        foreach ($usuario->getFillable() as $atributo) {
            $dato = $request[$atributo];
            if(isset($dato)){
                $usuario->setAttribute(strtolower($atributo), $dato);
            }
        }
        $usuario->save();
        //$response = Response::json($request,200);
        //return $response;
        return $this->login($request);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
