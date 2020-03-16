<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;
use Illuminate\Support\Facades\Response;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesor::all();
        $response = Response::json($profesores,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $profesor = new Profesor();
        foreach ($profesor->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $profesor->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $profesor->save();
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
        return Profesor::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesor = new Profesor();
        $profesor = Profesor::find($id);
        if(isset($profesor->ID_ESTUDIANTE)){
            $response = Response::json($profesor, 200);
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
        $profesor = new Profesor();
        $profesor = Profesor::find($id);
        if(isset($profesor->ID_ESTUDIANTE)){
            foreach ($profesor->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $profesor->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $profesor->save();
            $response = Response::json($profesor, 200);
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
        $profesor = new Profesor();
        $profesor = Profesor::find($id);
        if(isset($profesor->ID_ESTUDIANTE)){
            $response = Response::json($profesor,200);
            $profesor->delete();
        }
        return 204;
    }
}
