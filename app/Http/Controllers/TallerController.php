<?php

namespace App\Http\Controllers;
use App\Artesano;
use App\Talleres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;

class TallerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talleres = Talleres::all();
        return $this->showAll($talleres);
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
        $talleres = Talleres::create($campos);

        return response()->json(['data' =>$talleres]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $talleres = Talleres::findOrfail($id);
        return $this->showOne($talleres);
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
        $talleres = Talleres::findOrfail($id);

        if ($request->has('nombre_t')){
            $talleres->nombre_t =$request->nombre_t;
        }
        if ($request->has('direccion')){
            $talleres->direccion =$request->direccion;
        }
        if ($request->has('telefono')){
            $talleres->telefono =$request->telefono;
        }
        if ($request->has('id_artesano')){
            $talleres->id_artesano =$request->id_artesano;
        }
        
        if (!$talleres->isDirty()) {
            return response()->json(['error'=>'Especificar al menos un valor diferentepara actualizar','code'=> 422],422);
        }

        $talleres->save();
        return response()->json(['data'=> $talleres], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $talleres = Talleres::findOrfail($id);
        $talleres->delete();
        return response()->json(['data' => $talleres], 200);
    }
}
