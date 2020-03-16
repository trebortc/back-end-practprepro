<?php

namespace App\Http\Controllers;

use App\TemaUtilPracticasAgregar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TemaUtilPracticasAgregarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temaUtilPracticasAgregar = TemaUtilPracticasAgregar::all();
        $response = Response::json($temaUtilPracticasAgregar,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $temaUtilPracticasAgregar = new TemaUtilPracticasAgregar();
        foreach ($temaUtilPracticasAgregar->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $temaUtilPracticasAgregar->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $temaUtilPracticasAgregar->save();
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
        return TemaUtilPracticasAgregar::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $temaUtilPracticasAgregar = new TemaUtilPracticasAgregar();
        $temaUtilPracticasAgregar = TemaUtilPracticasAgregar::find($id);
        if(isset($temaUtilPracticasAgregar->ID_TEMA_UTIL_PRACTICAS_AGREGAR)){
            $response = Response::json($temaUtilPracticasAgregar, 200);
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
        $temaUtilPracticasAgregar = new TemaUtilPracticasAgregar();
        $temaUtilPracticasAgregar = TemaUtilPracticasAgregar::find($id);
        if(isset($temaUtilPracticasAgregar->ID_TEMA_UTIL_PRACTICAS_AGREGAR)){
            foreach ($temaUtilPracticasAgregar->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $temaUtilPracticasAgregar->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $temaUtilPracticasAgregar->save();
            $response = Response::json($temaUtilPracticasAgregar, 200);
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
        $temaUtilPracticasAgregar = new TemaUtilPracticasAgregar();
        $temaUtilPracticasAgregar = TemaUtilPracticasAgregar::find($id);
        if(isset($temaUtilPracticasAgregar->ID_TEMA_UTIL_PRACTICAS_AGREGAR)){
            $response = Response::json($temaUtilPracticasAgregar,200);
            $temaUtilPracticasAgregar->delete();
        }
        return 204;
    }
}
