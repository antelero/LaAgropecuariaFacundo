<?php

class WebCarritoController extends BaseController
{
    public function index()
    {
        return View::make('web.carrito.index');
    }

    public function agregar()
    {
        if (Auth::check()) {
            $productoArray = Input::all();

            $producto = Producto::find($productoArray['idProducto']);
            if ($producto->tipoProducto->id == 6) {
                $cantidad = '1';
            } else {
                $cantidad = $productoArray['cantidad'];
            }
            $agregarProducto = array();

            if (Session::has('agregarProducto')) {
                $agregarProducto = Session::get('agregarProducto');
            }

            $agregarProducto[$producto->id] = array(
                'producto' => $producto,
                'cantidad' => $cantidad,
            );

            // dd($agregarVino);

            Session::put('agregarProducto', $agregarProducto);

            return Redirect::to('carrito');
        } else {
            return Redirect::to('cuenta/login');
        }

    }

    public function quitar($idProducto)
    {
        // $agregarVino = array();

        // if (Session::has('agregarVino')) {
        //     $agregarVino = Session::get('agregarVino');
        // }

        // unset($agregarVino[$idVino]);

        // Session::put('agregarVino', $agregarVino);

        Session::forget('agregarProducto.' . $idProducto);

        return Redirect::to('carrito');
    }

    public function vaciar()
    {
        Session::forget('agregarProducto');

        return Redirect::to('carrito');
    }

    public static function calcularTotal()
    {
        $total = 0;

        if (Session::has('agregarProducto')) {
            $productoCarrito = Session::get('agregarProducto');

            foreach ($productoCarrito as $productoTotal) {
                if ($productoTotal['producto']->promocion == 1) {
                    $total += ($productoTotal['producto']->precio - $productoTotal['producto']->precio * $productoTotal['producto']->porcentajePromocion / 100) * $productoTotal['cantidad'];
                } else {
                    $total += $productoTotal['producto']->precio * $productoTotal['cantidad'];
                }
            }
        }

        return $total;
    }

    public function guardarPresupuesto()
    {

        if (Session::has('agregarProducto')) {
            $cliente              = Auth::user()->id;
            $total                = $this->calcularTotal('total');
            $fecha                = Carbon::now();
            $fechaParaVencimiento = Carbon::now();
            $fechaVencimiento     = $fechaParaVencimiento->addDays(7);

            $presupuesto = new Presupuesto();

            $presupuesto->idCliente        = $cliente;
            $presupuesto->fechaPedido      = $fecha;
            $presupuesto->fechaVencimiento = $fechaVencimiento;
            $presupuesto->total            = $total;

        }

        $presupuesto->save();

        $id = $presupuesto->id;

        $this->guardarPresupuestoDetalle($id);

        $this->vaciar();

        return View::make('web.presupuesto.mensaje', compact('presupuesto'));

    }

    private function guardarPresupuestoDetalle($idPresupuesto)
    {

        if (Session::has('agregarProducto')) {

            foreach (Session::get('agregarProducto') as $producto) {
                $presupuestoDetalle = new PresupuestoDetalle();

                $presupuestoDetalle->idPresupuesto = $idPresupuesto;
                $presupuestoDetalle->idProducto    = $producto['producto']->id;
                $presupuestoDetalle->cantidad      = $producto['cantidad'];
                $presupuestoDetalle->precio        = $producto['producto']->precio;
                $presupuestoDetalle->descuento     = $producto['producto']->precio * $producto['producto']->porcentajePromocion / 100;

                $presupuestoDetalle->save();
            }

        }
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

    public function guardarOrdenCompra()
    {

        if (Session::has('agregarProducto')) {
            $cliente              = Auth::user()->id;
            $total                = $this->calcularTotal('total');
            $fecha                = Carbon::now();
            $fechaParaVencimiento = Carbon::now();
            $fechaVencimiento     = $fechaParaVencimiento->addDays(2);

            $ordenCompra = new OrdenCompra();

            $ordenCompra->idCliente        = $cliente;
            $ordenCompra->fechaPedido      = $fecha;
            $ordenCompra->fechaVencimiento = $fechaVencimiento;
            $ordenCompra->total            = $total;

        }

        $ordenCompra->save();

        $id = $ordenCompra->id;

        $this->guardarOrdenCompraDetalle($id);

        $this->vaciar();

        return View::make('web.orden-compra.mensaje', compact('ordenCompra'));

    }

    private function guardarOrdenCompraDetalle($idOrdenCompra)
    {

        if (Session::has('agregarProducto')) {

            foreach (Session::get('agregarProducto') as $producto) {
                $ordenCompraDetalle = new OrdenCompraDetalle();

                $ordenCompraDetalle->idOrdenCompra = $idOrdenCompra;
                $ordenCompraDetalle->idProducto    = $producto['producto']->id;
                $ordenCompraDetalle->cantidad      = $producto['cantidad'];
                $ordenCompraDetalle->precio        = $producto['producto']->precio;
                $ordenCompraDetalle->descuento     = $producto['producto']->precio * $producto['producto']->porcentajePromocion / 100;

                $ordenCompraDetalle->save();
            }

        }
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
