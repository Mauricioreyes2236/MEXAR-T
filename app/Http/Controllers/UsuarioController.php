<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;

class UsuarioController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuarios::all();
        return $this->showAll($usuario);
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
        $usuario = Usuarios::create($campos);

        return response()->json(['data' =>$usuario]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuarios::findOrfail($id);
        return $this->showOne($usuario);
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
        $usuario = Usuarios::findOrfail($id);

        if ($request->has('nombre_u')){
            $usuario->nombre_u =$request->nombre_u;
        }
        if ($request->has('ap_u')){
            $usuario->ap_u =$request->ap_u;
        }
        if ($request->has('am_u')){
            $usuario->am_u =$request->am_u;
        }
        if ($request->has('telefono')){
            $usuario->telefono =$request->telefono;
        }
        if ($request->has('direccion')){
            $usuario->direccion =$request->direccion;
        }
        if ($request->has('email')){
            $usuario->email =$request->email;
        }
        if (!$usuario->isDirty()) {
            return response()->json(['error'=>'Especificar al menos un valor diferentepara actualizar','code'=> 422],422);
        }

        $usuario->save();
        return response()->json(['data'=> $usuario], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuarios::findOrfail($id);
        $usuario->delete();
        return response()->json(['data' => $usuario], 200);
    }
}
