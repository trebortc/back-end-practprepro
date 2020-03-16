<?php

namespace App\Http\Controllers;

use App\InformePracticas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class InformePracticasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informePracticas = InformePracticas::all();
        $response = Response::json($informePracticas,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $informePracticas = new InformePracticas();
        foreach ($informePracticas->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $informePracticas->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $informePracticas->save();
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
        return InformePracticas::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informePracticas = new InformePracticas();
        $informePracticas = InformePracticas::find($id);
        if(isset($informePracticas->ID_INFORME_PRACTICAS)){
            $response = Response::json($informePracticas, 200);
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
        $informePracticas = new InformePracticas();
        $informePracticas = InformePracticas::find($id);
        if(isset($informePracticas->ID_INFORME_PRACTICAS)){
            foreach ($informePracticas->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $informePracticas->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $informePracticas->save();
            $response = Response::json($informePracticas, 200);
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
        $informePracticas = new InformePracticas();
        $informePracticas = InformePracticas::find($id);
        if(isset($informePracticas->ID_INFORME_PRACTICAS)){
            $response = Response::json($informePracticas,200);
            $informePracticas->delete();
        }
        return 204;
    }
}
