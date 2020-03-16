<?php

namespace App\Http\Controllers;

use App\PeriodoPracticas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PeriodoPracticasContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodoPracticass = PeriodoPracticas::all();
        $response = Response::json($periodoPracticass,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $periodoPracticas = new PeriodoPracticas();
        foreach ($periodoPracticas->getFillable() as $atributo) {
            $dato = $request[strtoupper($atributo)];
            if(isset($dato)){
                $periodoPracticas->setAttribute(strtoupper($atributo), $dato);
            }
        }
        $periodoPracticas->save();
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
        return PeriodoPracticas::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $periodoPracticas = new PeriodoPracticas();
        $periodoPracticas = PeriodoPracticas::find($id);
        if(isset($periodoPracticas->ID_PERIODO_PRACTICAS)){
            $response = Response::json($periodoPracticas, 200);
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
        $periodoPracticas = new PeriodoPracticas();
        $periodoPracticas = PeriodoPracticas::find($id);
        if(isset($periodoPracticas->ID_PERIODO_PRACTICAS)){
            foreach ($periodoPracticas->getFillable() as $atributo) {
                $dato = $request[strtoupper($atributo)];
                if(isset($dato)){
                    $periodoPracticas->setAttribute(strtoupper($atributo), $dato);
                }
            }
            $periodoPracticas->save();
            $response = Response::json($periodoPracticas, 200);
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
        $periodoPracticas = new PeriodoPracticas();
        $periodoPracticas = PeriodoPracticas::find($id);
        if(isset($periodoPracticas->ID_PERIODO_PRACTICAS)){
            $response = Response::json($periodoPracticas,200);
            $periodoPracticas->delete();
        }
        return 204;
    }
}
