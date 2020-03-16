<?php

namespace App\Http\Controllers;

use App\Artesano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;

class ArtesanoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artesano = Artesano::all();
        return $this->showAll($artesano);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = $request->all();
        $artesano = Artesano::create($campos);

        return response()->json(['data' =>$artesano]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artesano = Artesano::findOrfail($id);
        return $this->showOne($artesano);
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
        $artesano = Artesano::findOrfail($id);
        
        
        if ($request->has('nombre_a')){
            $artesano->nombre_a = $request->nombre_a;
        }
        if ($request->has('ap_a')){
            $artesano->ap_a = $request->ap_a;
        }
        if ($request->has('ap_p')){
            $artesano->ap_p = $request->ap_p;
        }
        if ($request->has('edad')){
            $artesano->edad = $request->edad;
        }
        if ($request->has('telefono')){
            $artesano->telefono = $request->telefono;
        }
        if ($request->has('email')){
            $artesano->email = $request->email;
        }
        if (!$artesano->isDirty()) {
            return response()->json(['error'=>'Especificar al menos un valor diferentepara actualizar','code'=> 422],422);
        }
        
        $artesano->save();
        return response()->json(['data'=> $artesano], 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artesano = Artesano::findOrfail($id);
        $artesano->delete();
        return response()->json(['data' => $artesano], 200);
    }
}
