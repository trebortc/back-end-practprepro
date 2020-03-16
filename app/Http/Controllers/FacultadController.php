<?php

namespace App\Http\Controllers;

use App\Facultad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FacultadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facultads = Facultad::all();
        $response = Response::json($facultads,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $facultad = new Facultad();
        foreach ($facultad->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $facultad->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $facultad->save();
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
        return facultad::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facultad = new Facultad();
        $facultad = Facultad::find($id);
        if(isset($facultad->ID_FACULTAD)){
            $response = Response::json($facultad, 200);
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
        $facultad = new Facultad();
        $facultad = Facultad::find($id);
        if(isset($facultad->ID_facultad)){
            foreach ($facultad->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $facultad->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $facultad->save();
            $response = Response::json($facultad, 200);
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
        $facultad = new Facultad();
        $facultad = Facultad::find($id);
        if(isset($facultad->ID_facultad)){
            $response = Response::json($facultad,200);
            $facultad->delete();
        }
        return 204;
    }
}
