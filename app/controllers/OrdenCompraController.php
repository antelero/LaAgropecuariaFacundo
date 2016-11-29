<?php

class OrdenCompraController extends BaseController
{

    public function index()
    {
        $ordenesCompra = OrdenCompra::all();

        return View::make('admin.orden-compra.index', compact('ordenesCompra'));
    }


    /**
     * Esta funcion es para mostrar el detalle
     **/

    public function detalle($idOrdenCompra)
    {
        //$ordenCompraDetalles = OrdenCompra::find($idOrdenCompra)->ordenDetalleCompra->toJson();
        $ordenCompra = OrdenCompra::find($idOrdenCompra);

        //dd($ordenCompraDetalles);

        return View::make('admin.orden-compra.show', compact('ordenCompra'));
    }


    /**
     * Esta funcion es para actualizar la base de datos
     **/

    public function actualizar($id)
    {
        $ordenCompra   = OrdenCompra::find($id);
        $nuevaCantidad = [];

        foreach ($ordenCompra->ordenDetalleCompra as $ordenCompraDetalle) {
            if ($ordenCompra->estado == 0) {
                $producto = Producto::find($ordenCompraDetalle->idProducto);
                if ($ordenCompraDetalle->producto->tipoProducto->id != 6) {
                    $producto->cantidad = $ordenCompraDetalle->producto->cantidad - $ordenCompraDetalle->cantidad;
                    $producto->save();
                }
            }
        }

        $ordenCompra->estado = 1;
        $ordenCompra->save();

        return Redirect::to('admin/orden-compra');

    }

}
