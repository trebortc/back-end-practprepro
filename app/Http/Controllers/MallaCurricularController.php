<?php

namespace App\Http\Controllers;

use App\MallaCurricular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MallaCurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mallaCurriculars = MallaCurricular::with(['carrera','materias'])->get();
        $response = Response::json($mallaCurriculars,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $mallaCurricular = new MallaCurricular();
        foreach ($mallaCurricular->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $mallaCurricular->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $mallaCurricular->save();
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
        return MallaCurricular::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mallaCurricular = new MallaCurricular();
        $mallaCurricular = MallaCurricular::find($id);
        if(isset($mallaCurricular->ID_MALLA_CURRICULAR)){
            $response = Response::json($mallaCurricular, 200);
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
        $mallaCurricular = new MallaCurricular();
        $mallaCurricular = MallaCurricular::find($id);
        if(isset($mallaCurricular->ID_MALLA_CURRICULAR)){
            foreach ($mallaCurricular->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $mallaCurricular->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $mallaCurricular->save();
            $response = Response::json($mallaCurricular, 200);
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
        $mallaCurricular = new MallaCurricular();
        $mallaCurricular = MallaCurricular::find($id);
        if(isset($mallaCurricular->ID_MALLA_CURRICULAR)){
            $response = Response::json($mallaCurricular,200);
            $mallaCurricular->delete();
        }
        return 204;
    }
}
