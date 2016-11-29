<?php

class WebServicioController extends BaseController
{
    public function index()
    {
        $productos         = Producto::producto(Input::get('buscar'))->paginate(9)->appends(Input::all());
        $productoServicios = Producto::all();
        return View::make('web.servicio.index', compact('productos', 'productoServicios'));
    }

    public function detalle($id)
    {
        $productos = Producto::all();
        $producto  = Producto::find($id);

        $productoServicios = Producto::all();
        return View::make('web.servicio.detalle', compact('producto', 'productos', 'productoServicios'));
    }
}
