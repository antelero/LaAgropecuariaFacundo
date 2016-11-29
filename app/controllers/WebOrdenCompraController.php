<?php

class WebOrdenCompraController extends BaseController
{
    public function index()
    {
        $ordenesCompra = OrdenCompra::all();

        return View::make('web.orden-compra.index', compact('ordenesCompra'));
    }

    public function detalle($idOrdenCompra)
    {
        $ordenesCompra = OrdenCompra::find($idOrdenCompra);
        $detalles      = OrdenCompraDetalle::all();

        return View::make('web.orden-compra.show', compact('detalles', 'ordenesCompra'));
    }

    public function imprimirOrdenCompra($idOrdenCompra)
    {
        $imprimir = OrdenCompra::find($idOrdenCompra);

        $detalles = OrdenCompraDetalle::all();

        $fechaOriginal            = $imprimir->fechaPedido;
        $fechaVencimientoOriginal = $imprimir->fechaVencimiento;

        $pdf = PDF::loadView('web.orden-compra.imprimir-orden-compra', compact('imprimir', 'detalles', 'fechaOriginal', 'fechaVencimientoOriginal'));

        return $pdf->stream();
    }
}
