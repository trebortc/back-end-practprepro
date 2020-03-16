<?php

namespace App\Http\Controllers;

use App\SeguimientoInformePracticas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SeguimientoInformePracticasContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguimientoInformePracticas = SeguimientoInformePracticas::all();
        $response = Response::json($seguimientoInformePracticas,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $seguimientoInformePracticas = new SeguimientoInformePracticas();
        foreach ($seguimientoInformePracticas->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $seguimientoInformePracticas->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $seguimientoInformePracticas->save();
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
        return SeguimientoInformePracticas::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seguimientoInformePracticas = new SeguimientoInformePracticas();
        $seguimientoInformePracticas = SeguimientoInformePracticas::find($id);
        if(isset($seguimientoInformePracticas->ID_SEGUIMIENTO_INFORME_PRACTICAS)){
            $response = Response::json($seguimientoInformePracticas, 200);
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
        $seguimientoInformePracticas = new SeguimientoInformePracticas();
        $seguimientoInformePracticas = SeguimientoInformePracticas::find($id);
        if(isset($seguimientoInformePracticas->ID_SEGUIMIENTO_INFORME_PRACTICAS)){
            foreach ($seguimientoInformePracticas->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $seguimientoInformePracticas->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $seguimientoInformePracticas->save();
            $response = Response::json($seguimientoInformePracticas, 200);
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
        $seguimientoInformePracticas = new SeguimientoInformePracticas();
        $seguimientoInformePracticas = SeguimientoInformePracticas::find($id);
        if(isset($seguimientoInformePracticas->ID_SeguimientoInformePracticas)){
            $response = Response::json($seguimientoInformePracticas,200);
            $seguimientoInformePracticas->delete();
        }
        return 204;
    }
}
