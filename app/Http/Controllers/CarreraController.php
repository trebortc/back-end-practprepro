<?php

namespace App\Http\Controllers;

use App\carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = Carrera::all();
        $response = Response::json($carreras,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $carrera = new Carrera();
        foreach ($carrera->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $carrera->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $carrera->save();
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
        return Carrera::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrera = new Carrera();
        $carrera = Carrera::find($id);
        if(isset($carrera->ID_CARRERA)){
            $response = Response::json($carrera, 200);
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
        $carrera = new Carrera();
        $carrera = Carrera::find($id);
        if(isset($carrera->ID_CARRERA)){
            foreach ($carrera->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $carrera->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $carrera->save();
            $response = Response::json($carrera, 200);
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
        $carrera = new Carrera();
        $carrera = Carrera::find($id);
        if(isset($carrera->ID_CARRERA)){
            $response = Response::json($carrera,200);
            $carrera->delete();
        }
        return 204;
    }
}
