<?php

namespace App\Http\Controllers;

use App\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = Solicitud::all();
        $response = Response::json($solicitudes,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $solicitud = new Solicitud();
        foreach ($solicitud->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $solicitud->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $solicitud->save();
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
        return Solicitud::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitud = new Solicitud();
        $solicitud = Solicitud::find($id);
        if(isset($solicitud->ID_SOLICITUD)){
            $response = Response::json($solicitud, 200);
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
        $solicitud = new Solicitud();
        $solicitud = Solicitud::find($id);
        if(isset($solicitud->ID_SOLICITUD)){
            foreach ($solicitud->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $solicitud->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $solicitud->save();
            $response = Response::json($solicitud, 200);
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
        $solicitud = new Solicitud();
        $solicitud = Solicitud::find($id);
        if(isset($solicitud->ID_SOLICITUD)){
            $response = Response::json($solicitud,200);
            $solicitud->delete();
        }
        return 204;
    }
}
