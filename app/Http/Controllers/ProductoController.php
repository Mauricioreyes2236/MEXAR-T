<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;

class ProductoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Producto::all();
        return $this->showAll($producto);
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
        $producto = Producto::create($campos);

        return response()->json(['data' =>$producto]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::findOrfail($id);
        return $this->showOne($producto);
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
        $producto = Producto::findOrfail($id);

        if ($request->has('nombre_p')){
            $producto->nombre_p =$request->nombre_p;
        }
        if ($request->has('costo')){
            $producto->costo =$request->costo;
        }
        if ($request->has('descripcion')){
            $producto->descripcion =$request->descripcion;
        }
        if ($request->has('imagen')){
            $producto->imagen =$request->imagen;
        }
        if (!$producto->isDirty()) {
            return response()->json(['error'=>'Especificar al menos un valor diferentepara actualizar','code'=> 422],422);
        }

        $producto->save();
        return response()->json(['data'=> $producto], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrfail($id);
        $producto->delete();
        return response()->json(['data' => $producto], 200);
    }
}
