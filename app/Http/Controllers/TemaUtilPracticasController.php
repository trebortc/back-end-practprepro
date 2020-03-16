<?php

namespace App\Http\Controllers;

use App\TemaUtilPracticas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TemaUtilPracticasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temaUtilPracticas = TemaUtilPracticas::all();
        $response = Response::json($temaUtilPracticas,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $temaUtilPracticas = new TemaUtilPracticas();
        foreach ($temaUtilPracticas->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $temaUtilPracticas->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $temaUtilPracticas->save();
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
        return TemaUtilPracticas::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $temaUtilPracticas = new TemaUtilPracticas();
        $temaUtilPracticas = TemaUtilPracticas::find($id);
        if(isset($temaUtilPracticas->ID_TEMA_UTIL_PRACTICAS)){
            $response = Response::json($temaUtilPracticas, 200);
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
        $temaUtilPracticas = new TemaUtilPracticas();
        $temaUtilPracticas = TemaUtilPracticas::find($id);
        if(isset($temaUtilPracticas->ID_TEMA_UTIL_PRACTICAS)){
            foreach ($temaUtilPracticas->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $temaUtilPracticas->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $temaUtilPracticas->save();
            $response = Response::json($temaUtilPracticas, 200);
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
        $temaUtilPracticas = new TemaUtilPracticas();
        $temaUtilPracticas = TemaUtilPracticas::find($id);
        if(isset($temaUtilPracticas->ID_TEMA_UTIL_PRACTICAS)){
            $response = Response::json($temaUtilPracticas,200);
            $temaUtilPracticas->delete();
        }
        return 204;
    }
}
