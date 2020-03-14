<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this-> enviarRespuesta(Producto::paginate(),'Listado Productos',200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator=Producto::validar($request->all());
        if($validator->fails()){
            return $this->enviarError('Error al crear nuevo producto',$validator->errors(), 400);
        }

        $producto=Producto::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request -> input('descripcion'),
            'cantidad' => $request -> input('cantidad'),
            'precio' => $request -> input('precio'),
            'codigo' => $request -> input('codigo')
        ]);

        return $this->enviarRespuesta($producto->toArray(), 'Producto creado', 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
