<?php

class TipoProductoController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tipoProductos = TipoProducto::all();

        return View::make('admin.tipo-producto.index', compact('tipoProductos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.tipo-producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $datos = Input::all();

        $reglas = array(
            'nombre' => 'required|unique:tipo_productos',
        );

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {
            $tipoProducto = new TipoProducto();
            $tipoProducto->fill($datos);
            $tipoProducto->save();

            return Redirect::to('admin/tipo-producto')->with('exito', 'El tipo de producto fue creado');
        } else {
            return Redirect::back()->withInput()->withErrors($validar);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $tipoProducto = TipoProducto::find($id);

        return View::make('admin.tipo-producto.show', compact('tipoProducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tipoProducto = TipoProducto::find($id);

        return View::make('admin.tipo-producto.edit', compact('tipoProducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $datos = Input::all();

        $reglas = array(
            'nombre' => 'required|unique:tipo_productos,nombre,' . $id,
        );

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {
            $tipoProducto = TipoProducto::find($id);
            $tipoProducto->fill($datos);
            $tipoProducto->save();

            return Redirect::to('admin/tipo-producto')->with('exito', 'El tipo de producto fue actualizado');
        } else {
            return Redirect::back()->withInput()->withErrors($validar);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
