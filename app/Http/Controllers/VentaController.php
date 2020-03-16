<?php

namespace App\Http\Controllers;
use App\Usuarios;
use App\Artesano;
use App\Producto;
use App\Ventas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;

class VentaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venta = Ventas::all();
        return $this->showAll($venta);
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
        $venta = Ventas::create($campos);

        return response()->json(['data' =>$venta]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Ventas::findOrfail($id);
        return $this->showOne($venta);
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
        $venta = Ventas::findOrfail($id);


        if ($request->has('id_usuario')){
            $venta->id_usuario =$request->id_usuario;
        }
        if ($request->has('id_artesano')){
            $venta->id_artesano =$request->id_artesano;
        }
        if ($request->has('id_producto')){
            $venta->id_producto =$request->id_producto;
        }
        if (!$venta->isDirty()) {
            return response()->json(['error'=>'Especificar al menos un valor diferentepara actualizar','code'=> 422],422);
        }

        $venta->save();
        return response()->json(['data'=> $venta], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = Ventas::findOrfail($id);
        $venta->delete();
        return response()->json(['data' => $venta], 200);
    }
}
