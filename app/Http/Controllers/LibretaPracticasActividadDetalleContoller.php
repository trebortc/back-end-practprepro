<?php

namespace App\Http\Controllers;

use App\LibretaPracticasActividadDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LibretaPracticasActividadDetalleContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libretaPracticasActividadDetalles = LibretaPracticasActividadDetalle::all();
        $response = Response::json($libretaPracticasActividadDetalles,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $libretaPracticasActividadDetalle = new LibretaPracticasActividadDetalle();
        foreach ($libretaPracticasActividadDetalle->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $libretaPracticasActividadDetalle->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $libretaPracticasActividadDetalle->save();
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
        return LibretaPracticasActividadDetalle::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libretaPracticasActividadDetalle = new LibretaPracticasActividadDetalle();
        $libretaPracticasActividadDetalle = LibretaPracticasActividadDetalle::find($id);
        if(isset($libretaPracticasActividadDetalle->ID_LIBRETA_PRACTICAS_ACTIVIDAD_DETALLE)){
            $response = Response::json($libretaPracticasActividadDetalle, 200);
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
        $libretaPracticasActividadDetalle = new LibretaPracticasActividadDetalle();
        $libretaPracticasActividadDetalle = LibretaPracticasActividadDetalle::find($id);
        if(isset($libretaPracticasActividadDetalle->ID_LIBRETA_PRACTICAS_ACTIVIDAD_DETALLE)){
            foreach ($libretaPracticasActividadDetalle->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $libretaPracticasActividadDetalle->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $libretaPracticasActividadDetalle->save();
            $response = Response::json($libretaPracticasActividadDetalle, 200);
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
        $libretaPracticasActividadDetalle = new LibretaPracticasActividadDetalle();
        $libretaPracticasActividadDetalle = LibretaPracticasActividadDetalle::find($id);
        if(isset($libretaPracticasActividadDetalle->ID_LIBRETA_PRACTICAS_ACTIVIDAD_DETALLE)){
            $response = Response::json($libretaPracticasActividadDetalle,200);
            $libretaPracticasActividadDetalle->delete();
        }
        return 204;
    }
}
