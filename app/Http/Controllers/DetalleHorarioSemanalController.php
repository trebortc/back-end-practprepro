<?php

namespace App\Http\Controllers;

use App\DetalleHorarioSemanal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DetalleHorarioSemanalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalleHorarioSemanales = DetalleHorarioSemanal::all();
        $response = Response::json($detalleHorarioSemanales,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $detalleHorarioSemanal = new DetalleHorarioSemanal();
        foreach ($detalleHorarioSemanal->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $detalleHorarioSemanal->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $detalleHorarioSemanal->save();
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
        return DetalleHorarioSemanal::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleHorarioSemanal = new DetalleHorarioSemanal();
        $detalleHorarioSemanal = DetalleHorarioSemanal::find($id);
        if(isset($detalleHorarioSemanal->ID_DETALLE_HORARIO_SEMANAL)){
            $response = Response::json($detalleHorarioSemanal, 200);
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
        $detalleHorarioSemanal = new DetalleHorarioSemanal();
        $detalleHorarioSemanal = DetalleHorarioSemanal::find($id);
        if(isset($detalleHorarioSemanal->ID_DETALLE_HORARIO_SEMANAL)){
            foreach ($detalleHorarioSemanal->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $detalleHorarioSemanal->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $detalleHorarioSemanal->save();
            $response = Response::json($detalleHorarioSemanal, 200);
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
        $detalleHorarioSemanal = new DetalleHorarioSemanal();
        $detalleHorarioSemanal = DetalleHorarioSemanal::find($id);
        if(isset($detalleHorarioSemanal->ID_DetalleHorarioSemanal)){
            $response = Response::json($detalleHorarioSemanal,200);
            $detalleHorarioSemanal->delete();
        }
        return 204;
    }
}
