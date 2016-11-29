<?php

class NotaPedidoController extends BaseController
{

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $notasPedido = NotaPedido::all();

        return View::make('admin.nota-pedido.index', compact('notasPedido'));
    }


    /**
     * @return \Illuminate\View\View
     */
    public function indexNota()
    {
        $opcionProveedor = Proveedor::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $proveedor       = [ '' => 'Seleccione el Proveedor' ] + $opcionProveedor;
        $productos       = Producto::paginate(5);

        return View::make('admin.nota-pedido.nueva', compact('proveedor', 'productos'));
    }


    /**
     * @return string
     */
    public function producto()
    {
        $productos = Producto::paginate(5);

        return View::make('admin.nota-pedido.producto', compact('productos'))->render();
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function seleccionarProducto()
    {
        $id = Input::get('id');

        $producto = Producto::find($id);

        return Response::json([
            'success' => true,
            'data'    => $producto
        ], 200);
    }


    /**
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function guardar()
    {
        $datos = Input::all();

        $reglas = [
            'idProveedor' => 'required',
        ];

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {
            $productos = array_filter(Input::get('producto'), [ $this, 'removerElementosVacios' ]);

            if ( ! empty( $productos )) {
                $notaPedido = new NotaPedido([
                    'idUsuario'      => Auth::id(),
                    'idProveedor'    => Input::get('idProveedor'),
                    'fechaPedido'    => date('Y-m-d'),
                    'fechaRecepcion' => date('Y-m-d'),
                ]);

                $notaPedido->save();

                foreach ($productos as $producto) {
                    NotaPedidoDetalle::create([
                        'idNotaPedido' => $notaPedido->id,
                        'idProducto'   => $producto['codigo'],
                        'cantidad'     => $producto['cantidad'],
                    ]);
                }

                return Redirect::to('admin/nota-pedido');
            } else {
                return Redirect::back()->withInput()->with('error', 'No contiene productos seleccionados');
            }
        }

        return Redirect::back()->withInput()->withErrors($validar);
    }


    /**
     * @param $elemento
     *
     * @return array|bool
     */
    protected function removerElementosVacios(&$elemento)
    {
        if (is_array($elemento)) {
            if ($key = key($elemento)) {
                $elemento[$key] = array_filter($elemento);
            }

            if (count($elemento) != count($elemento, COUNT_RECURSIVE)) {
                $elemento = array_filter(current($elemento), __METHOD__);
            }

            $elemento = array_filter($elemento);

            return $elemento;
        } else {
            return empty( $elemento ) ? false : $elemento;
        }
    }

}
