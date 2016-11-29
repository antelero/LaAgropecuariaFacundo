<?php

// Rutas de la Web
Route::get('/', 'WebController@index');

Route::group([ 'prefix' => 'cuenta' ], function () {
    // Rutas no autenticadas
    Route::group([ 'before' => 'guest' ], function () {
        // Rutas de login
        Route::get('login', 'WebCuentaLoginController@index');
        Route::post('login', 'WebCuentaLoginController@login');

        Route::get('crear', 'WebCuentaController@crear');
        Route::post('crear', 'WebCuentaController@guardar');

        Route::get('activar/{codigo}', 'WebCuentaController@activar');

        Route::get('recuperar-password', 'WebCuentaController@recuperarPassword');
        Route::post('recuperar-password', 'WebCuentaController@recuperarPasswordGuardar');

        Route::get('activar-password/{codigo}', 'WebCuentaController@activarPassword');
    });

    // Rutas Autenticadas
    Route::group([ 'before' => 'auth' ], function () {
        Route::get('/', 'WebCuentaController@index');

        Route::get('perfil', 'WebCuentaPerfilController@index');
        Route::get('perfil/editar', 'WebCuentaPerfilController@editar');
        Route::post('perfil/editar', 'WebCuentaPerfilController@actualizar');

        Route::get('perfil/cambiar-password', 'WebCuentaPerfilController@editarPassword');
        Route::post('perfil/cambiar-password', 'WebCuentaPerfilController@actualizarPassword');

        // Rutas de logout
        Route::get('logout', 'WebCuentaLoginController@logout');
    });
});

View::composer([ 'web.sidebar.tipo-producto', 'web.sidebar.prueba' ], function ($menu) {
    $menuTipoProductos = TipoProducto::with('producto')->get();
    $menu->with('menuTipoProductos', $menuTipoProductos);
});

View::composer([ 'web.layout.pie-arriba' ], function ($view) {
    $publicidades = Publicidad::all();
    $view->with('publicidades', $publicidades);
});

//Rutas de los Productos
Route::get('producto', 'WebProductoController@index');
Route::get('producto/detalle/{id}', 'WebProductoController@detalle');
Route::get('producto/{nombre}/{id}', 'WebProductoController@filtro');

//Rutas de los Servicios
Route::get('servicio', 'WebServicioController@index');
Route::get('servicio/detalle/{id}', 'WebServicioController@detalle');

//Rutas del Carrito de Compras
Route::get('carrito', 'WebCarritoController@index');
Route::post('carrito/agregar', 'WebCarritoController@agregar');
Route::get('carrito/quitar/{id}', 'WebCarritoController@quitar');
Route::get('carrito/vaciar', 'WebCarritoController@vaciar');

Route::get('carrito/guardar/presupuesto', 'WebCarritoController@guardarPresupuesto');
Route::get('carrito/imprimir/presupuesto/{id}', 'WebCarritoController@imprimirPresupuesto');

Route::get('carrito/guardar/orden-compra', 'WebCarritoController@guardarOrdenCompra');
Route::get('carrito/imprimir/orden-compra/{id}', 'WebCarritoController@imprimirOrdenCompra');

//Rutas de la Lista de Presupuesto
Route::get('presupuesto', 'WebPresupuestoController@index');
Route::get('presupuesto/{id}', 'WebPresupuestoController@detalle');
Route::get('presupuesto/imprimir/{id}', 'WebPresupuestoController@imprimirPresupuesto');

//Rutas de la Lista de Orden de Compra
Route::get('orden-compra', 'WebOrdenCompraController@index');
Route::get('orden-compra/{id}', 'WebOrdenCompraController@detalle');
Route::get('orden-compra/imprimir/{id}', 'WebOrdenCompraController@imprimirOrdenCompra');

//Rutas de las Consultas
Route::get('consulta', 'WebConsultaController@index');
Route::get('consulta/crear', 'WebConsultaController@create');
Route::post('consulta/crear', 'WebConsultaController@store');
Route::get('consulta/ver', 'WebConsultaController@indexConsulta');
Route::get('consulta/ver/{id}', 'WebConsultaController@verConsulta');

//Rutas de las Publicidades

// Rutas de la Administracion
Route::group([ 'prefix' => 'admin' ], function () {
    // Rutas no autenticadas
    Route::group([ 'before' => 'guest-admin' ], function () {
        Route::get('login', 'LoginAdminController@index');
        Route::post('login', 'LoginAdminController@login');
    });
    // Rutas autenticadas
    Route::group([ 'before' => 'auth-admin' ], function () {
        Route::get('logout', 'LoginAdminController@logout');

        Route::group([ 'prefix' => 'perfil' ], function () {
            Route::get('/', 'PerfilAdminController@index');
            Route::get('editar', 'PerfilAdminController@editar');
            Route::post('editar', 'PerfilAdminController@actualizar');
            Route::get('password', 'PerfilAdminController@editarPassword');
            Route::post('password', 'PerfilAdminController@actualizarPassword');
        });

        Route::get('/', 'AdminController@index');

        //Rutas del Usuario
        Route::group([ 'before' => 'auth-admin' ], function () {
            Route::resource('usuario', 'UsuarioController');
        });
        //Rutas del Cliente
        Route::resource('cliente', 'ClienteController');
        //Rutas de Provincias
        Route::resource('provincia', 'ProvinciaController');
        //Rutas de Tipo de Productos
        Route::resource('tipo-producto', 'TipoProductoController');
        //Rutas de Productos y Servicios
        Route::resource('producto-servicio', 'ProductoController');
        //Rutas de Servicios
        //Route::resource('servicio', 'ServicioController');
        //Rutas de Proveedores
        Route::resource('proveedor', 'ProveedorController');
        //Rutas de las Publicidades
        Route::resource('publicidad', 'PublicidadController');

        Route::group([ 'before' => 'auth-admin' ], function () {
            Route::resource('usuario', 'UsuarioAdminController');
        });

        //Rutas de Consultas
        Route::get('consulta', 'ConsultaController@index');
        Route::get('consulta/responder/{id}', 'ConsultaController@responder');
        Route::post('consulta/responder/{id}', 'ConsultaController@guardar');
        //Rutas de la Lista de Orden de Compra
        Route::get('orden-compra', 'OrdenCompraController@index');
        Route::get('orden-compra/{id}', 'OrdenCompraController@detalle');
        Route::post('orden-compra/actualizar/{id}', 'OrdenCompraController@actualizar');
        //Rutas de la Lista de Orden de Compra
        Route::get('nota-pedido', 'NotaPedidoController@index');

        //Rutas de las Notas de Pedido modificadas
        Route::get('nota-pedido', 'NotaPedidoController@index');
        Route::get('nota-pedido/nueva', 'NotaPedidoController@indexNota');
        Route::get('nota-pedido/producto', 'NotaPedidoController@producto');
        Route::post('nota-pedido/seleccionar-producto', 'NotaPedidoController@seleccionarProducto');
        Route::post('nota-pedido/guardar', 'NotaPedidoController@guardar');
    });
});
