<?php

namespace App\Http\Controllers;

use App\LibretaPracticasActividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LibretaPracticasActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libretaPracticasActividads = LibretaPracticasActividad::all();
        $response = Response::json($libretaPracticasActividads,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $libretaPracticasActividad = new LibretaPracticasActividad();
        foreach ($libretaPracticasActividad->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $libretaPracticasActividad->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $libretaPracticasActividad->save();
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
        return LibretaPracticasActividad::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libretaPracticasActividad = new LibretaPracticasActividad();
        $libretaPracticasActividad = LibretaPracticasActividad::find($id);
        if(isset($libretaPracticasActividad->ID_LIBRETA_PRACTICAS_ACTIVIDAD)){
            $response = Response::json($libretaPracticasActividad, 200);
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
        $libretaPracticasActividad = new LibretaPracticasActividad();
        $libretaPracticasActividad = LibretaPracticasActividad::find($id);
        if(isset($libretaPracticasActividad->ID_LibretaPracticasActividad)){
            foreach ($libretaPracticasActividad->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $libretaPracticasActividad->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $libretaPracticasActividad->save();
            $response = Response::json($libretaPracticasActividad, 200);
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
        $libretaPracticasActividad = new LibretaPracticasActividad();
        $libretaPracticasActividad = LibretaPracticasActividad::find($id);
        if(isset($libretaPracticasActividad->ID_LIBRETA_PRACTICAS_ACTIVIDAD)){
            $response = Response::json($libretaPracticasActividad,200);
            $libretaPracticasActividad->delete();
        }
        return 204;
    }
}
