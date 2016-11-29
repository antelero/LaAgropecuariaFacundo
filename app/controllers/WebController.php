<?php

class WebController extends BaseController
{

    public function index()
    {
        $productos         = Producto::where('promocion', 1)->get();
        $tipoProductos     = TipoProducto::with('producto')->get();
        $tipoProductoMenu  = $tipoProductos->first();
        $productoServicios = Producto::all();

        return View::make('web.inicio.index', compact('productos', 'tipoProductos', 'tipoProductoMenu', 'productoServicios'));
    }
}
