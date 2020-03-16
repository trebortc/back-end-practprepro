<?php

namespace App\Http\Controllers;

use App\Temas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TemasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temas = Temas::all();
        $response = Response::json($temas,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tema = new Temas();
        foreach ($tema->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $tema->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $tema->save();
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
        return Temas::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tema = new Temas();
        $tema = Temas::find($id);
        if(isset($tema->ID_TEMAS)){
            $response = Response::json($tema, 200);
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
        $tema = new Temas();
        $tema = Temas::find($id);
        if(isset($tema->ID_TEMAS)){
            foreach ($tema->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $tema->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $tema->save();
            $response = Response::json($tema, 200);
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
        $tema = new Temas();
        $tema = Temas::find($id);
        if(isset($tema->ID_TEMAS)){
            $response = Response::json($tema,200);
            $tema->delete();
        }
        return 204;
    }
}
