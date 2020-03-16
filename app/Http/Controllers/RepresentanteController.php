<?php

namespace App\Http\Controllers;

use App\Representante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RepresentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representantes = Representante::all();
        $response = Response::json($representantes,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $representante = new Representante();
        foreach ($representante->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $representante->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $representante->save();
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
        return Representante::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $representante = new Representante();
        $representante = Representante::find($id);
        if(isset($representante->ID_REPRESENTANTE)){
            $response = Response::json($representante, 200);
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
        $representante = new Representante();
        $representante = Representante::find($id);
        if(isset($representante->ID_REPRESENTANTE)){
            foreach ($representante->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $representante->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $representante->save();
            $response = Response::json($representante, 200);
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
        $representante = new Representante();
        $representante = Representante::find($id);
        if(isset($representante->ID_REPRESENTANTE)){
            $response = Response::json($representante,200);
            $representante->delete();
        }
        return 204;
    }
}
