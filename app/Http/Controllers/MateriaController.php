<?php

namespace App\Http\Controllers;

use App\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Materia::with('mallaCurricular', 'temasEstudio')->get();
        $response = Response::json($materias,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $materia = new Materia();
        foreach ($materia->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $materia->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $materia->save();
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
        return materia::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materia = new Materia();
        $materia = materia::find($id);
        if(isset($materia->ID_MATERIA)){
            $response = Response::json($materia, 200);
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
        $materia = new Materia();
        $materia = Materia::find($id);
        if(isset($materia->ID_MATERIA)){
            foreach ($materia->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $materia->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $materia->save();
            $response = Response::json($materia, 200);
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
        $materia = new Materia();
        $materia = Materia::find($id);
        if(isset($materia->ID_MATERIA)){
            $response = Response::json($materia,200);
            $materia->delete();
        }
        return 204;
    }
}
