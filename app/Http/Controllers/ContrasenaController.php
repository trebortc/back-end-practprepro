<?php

namespace App\Http\Controllers;

use App\Mail\CambiarContrasenaMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class ContrasenaController extends Controller
{
    public function obtenerLinkNuevaContrasena(Request $request)
    {
        $correo = $request['correo'];
        if(!$this->validarCorreo($correo)){
            return $this->errorCorreo();
        }
        $this->enviar($correo);
        return $this->exitoCorreo();
    }

    // Cambiar contrasena peticion
    public function enviarCorreo($correo) {
        if (!$this->validarCorreo($correo)){
            return $this->errorCorreo();
        }
    }

    public function enviar($correo) {
        $token = $this->crearToken($correo);
        Mail::to($correo)->send(new CambiarContrasenaMail($token));
    }

    public function validarCorreo($email) {
        return User::where('email', $email)->first();
    }

    public function crearToken($email) {
        $antiguoToken = DB::table('password_resets')->where(['email'=>$email])->first();
        if(isset($antiguoToken)){
            return $antiguoToken->token;
        }
        $token = str_random(60);
        $this->guardarToken($token, $email);
        return $token;
    }

    public function guardarToken($token, $email) {
        DB::table('password_resets')->insert(
            [
                'email' => $email,
                'token' =>$token,
                'created_at' => Carbon::now()
            ]
        );
    }
    //Reestablecer contreseña con link token
    public function cambiarContrasena(Request $request)
    {
        return $this->getContrasenaRestablecerTablaFila($request)->count() > 0 ? $this->restablecerContrasena($request) : $this->tokenNoEncontrado();
    }

    public function getContrasenaRestablecerTablaFila(Request $request)
    {
        $email = $request['email'];
        $token = $request['restablecerToken'];
        return DB::table('password_resets')->where(['email'=>$email, 'token'=>$token]);
    }

    public function restablecerContrasena(Request $request)
    {
        $email = $request['email'];
        $usuario = User::whereEmail($email)->first();
        $contasenaSimple = $request['password'];
        $usuario->update(['password'=>$contasenaSimple]);
        $this->getContrasenaRestablecerTablaFila($request)->delete();
        $response = Response::json('Contraseña restablecida con exito ...', 200);
        return $response;
    }

    public function tokenNoEncontrado()
    {
        $response = Response::json(['error'=>'Token o Correo son incorrectos', 404]);
    }

    //
    public function errorCorreo() {
        $response = Response::json(['error'=>'Correo no existe en DB'], 404);// Response::HTTP_NOT_FOUND
        return $response;
    }
    public function exitoCorreo() {
        $response = Response::json(['exito'=>'Email enviado, revise su correo'], 200);// Response::HTTP_NOT_FOUND
        return $response;
    }
}
