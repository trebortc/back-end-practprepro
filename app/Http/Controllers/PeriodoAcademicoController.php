<?php

namespace App\Http\Controllers;

use App\PeriodoAcademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PeriodoAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodoAcademicos = PeriodoAcademico::all();
        $response = Response::json($periodoAcademicos,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $periodoAcademico = new PeriodoAcademico();
        foreach ($periodoAcademico->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $periodoAcademico->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $periodoAcademico->save();
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
        return PeriodoAcademico::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $periodoAcademico = new PeriodoAcademico();
        $periodoAcademico = PeriodoAcademico::find($id);
        if(isset($periodoAcademico->ID_PERIODO_ACADEMICO)){
            $response = Response::json($periodoAcademico, 200);
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
        $periodoAcademico = new PeriodoAcademico();
        $periodoAcademico = PeriodoAcademico::find($id);
        if(isset($periodoAcademico->ID_PERIODO_ACADEMICO)){
            foreach ($periodoAcademico->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $periodoAcademico->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $periodoAcademico->save();
            $response = Response::json($periodoAcademico, 200);
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
        $periodoAcademico = new PeriodoAcademico();
        $periodoAcademico = PeriodoAcademico::find($id);
        if(isset($periodoAcademico->ID_PERIODO_ACADEMICO)){
            $response = Response::json($periodoAcademico,200);
            $periodoAcademico->delete();
        }
        return 204;
    }
}
