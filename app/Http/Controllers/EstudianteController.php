<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Estudiante;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        $response = Response::json($estudiantes,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $estudiante = new Estudiante();
        foreach ($estudiante->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $estudiante->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $estudiante->save();
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
        return Estudiante::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = new Estudiante();
        $estudiante = Estudiante::find($id);
        if(isset($estudiante->ID_ESTUDIANTE)){
           $response = Response::json($estudiante, 200);
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
        $estudiante = new Estudiante();
        $estudiante = Estudiante::find($id);
        if(isset($estudiante->ID_ESTUDIANTE)){
            foreach ($estudiante->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $estudiante->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $estudiante->save();
            $response = Response::json($estudiante, 200);
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
        $estudiante = new Estudiante();
        $estudiante = Estudiante::find($id);
        if(isset($estudiante->ID_ESTUDIANTE)){
            $response = Response::json($estudiante,200);
            $estudiante->delete();
        }
        return 204;
    }
}
