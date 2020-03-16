<?php

namespace App\Http\Controllers;

use App\HabilidadesDestrezasAdquiridas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HabilidadesDestrezasAdquiridasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habilidadesDestrezasAdquiridas = HabilidadesDestrezasAdquiridas::all();
        $response = Response::json($habilidadesDestrezasAdquiridas,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $habilidadesDestrezasAdquiridas = new HabilidadesDestrezasAdquiridas();
        foreach ($habilidadesDestrezasAdquiridas->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $habilidadesDestrezasAdquiridas->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $habilidadesDestrezasAdquiridas->save();
        $response = Response::json($request,200);
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return HabilidadesDestrezasAdquiridas::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habilidadesDestrezasAdquiridas = new HabilidadesDestrezasAdquiridas();
        $habilidadesDestrezasAdquiridas = HabilidadesDestrezasAdquiridas::find($id);
        if(isset($habilidadesDestrezasAdquiridas->ID_HABILIDADES_DESTREZAS_ADQUIRIDAS)){
            $response = Response::json($habilidadesDestrezasAdquiridas, 200);
        }
        $response = Response::json('', 404);
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $habilidadesDestrezasAdquiridas = new HabilidadesDestrezasAdquiridas();
        $habilidadesDestrezasAdquiridas = HabilidadesDestrezasAdquiridas::find($id);
        if(isset($habilidadesDestrezasAdquiridas->ID_HABILIDADES_DESTREZAS_ADQUIRIDAS)){
            foreach ($habilidadesDestrezasAdquiridas->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $habilidadesDestrezasAdquiridas->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $habilidadesDestrezasAdquiridas->save();
            $response = Response::json($habilidadesDestrezasAdquiridas, 200);
            return $response;
        }
        $response = Response::json('', 404);
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habilidadesDestrezasAdquiridas = new HabilidadesDestrezasAdquiridas();
        $habilidadesDestrezasAdquiridas = HabilidadesDestrezasAdquiridas::find($id);
        if(isset($habilidadesDestrezasAdquiridas->ID_HABILIDADES_DESTREZAS_ADQUIRIDAS)){
            $response = Response::json($habilidadesDestrezasAdquiridas,200);
            $habilidadesDestrezasAdquiridas->delete();
        }
        return 204;
    }
}
