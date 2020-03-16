<?php

namespace App\Http\Controllers;

use App\Administrativo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administrativos = Administrativo::all();
        $response = Response::json($administrativos,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $administrativo = new Administrativo();
        foreach ($administrativo->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $administrativo->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $administrativo->save();
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
        return Administrativo::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $administrativo = new Administrativo();
        $administrativo = Administrativo::find($id);
        if(isset($administrativo->ID_ADMINISTRATIVO)){
            $response = Response::json($administrativo, 200);
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
        $administrativo = new Administrativo();
        $administrativo = Administrativo::find($id);
        if(isset($administrativo->ID_Administrativo)){
            foreach ($administrativo->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $administrativo->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $administrativo->save();
            $response = Response::json($administrativo, 200);
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
        $administrativo = new Administrativo();
        $administrativo = Administrativo::find($id);
        if(isset($administrativo->ID_ADMINISTRATIVO)){
            $response = Response::json($administrativo,200);
            $administrativo->delete();
        }
        return 204;
    }
}
