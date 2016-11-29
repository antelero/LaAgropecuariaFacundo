<?php

class WebProductoController extends BaseController
{
    public function index()
    {
        $productos = Producto::producto(Input::get('buscar'))->paginate(6)->appends(Input::all());

        $tipoProductos    = TipoProducto::with('producto')->get();
        $tipoProductoMenu = $tipoProductos->first();

        return View::make('web.producto.index', compact('productos', 'tipoProductos', 'tipoProductoMenu'));
    }

    public function detalle($id)
    {
        $producto = Producto::find($id);

        return View::make('web.producto.detalle', compact('producto'));
    }

    public function filtro($nombre, $id)
    {
        switch ($nombre) {

            case 'tipo-producto':
                $idBuscar = 'idTipoProducto';
                break;

            case 'detalle':
                $idBuscar = 'id';
                break;

        }

        $productos = Producto::where($idBuscar, $id)->paginate(6);

        return View::make('web.producto.index', compact('productos'));
    }
}
