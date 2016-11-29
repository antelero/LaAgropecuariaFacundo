<?php

class WebPresupuestoController extends BaseController
{
    public function index()
    {
        $presupuestos = Presupuesto::all();

        return View::make('web.presupuesto.index', compact('presupuestos'));
    }

    public function detalle($idPresupuesto)
    {
        $presupuestos = Presupuesto::find($idPresupuesto);
        $detalles     = PresupuestoDetalle::all();

        return View::make('web.presupuesto.show', compact('detalles', 'presupuestos'));
    }

    public function imprimirPresupuesto($idPresupuesto)
    {
        $imprimir = Presupuesto::find($idPresupuesto);

        $detalles = PresupuestoDetalle::all();

        $fechaOriginal            = $imprimir->fechaPedido;
        $fechaVencimientoOriginal = $imprimir->fechaVencimiento;

        $pdf = PDF::loadView('web.presupuesto.imprimir-presupuesto', compact('imprimir', 'detalles', 'fechaOriginal', 'fechaVencimientoOriginal'));

        return $pdf->stream();
    }
}
