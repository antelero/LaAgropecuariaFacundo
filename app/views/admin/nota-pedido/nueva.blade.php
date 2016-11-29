@extends('admin.layout.default')

@section('migasPan')
    <h1>
        Nota de Pedido
        <small>Crear</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ url('admin/nota-pedido') }}"><i class="fa fa-user"></i> Nota de Pedido</a></li>
        <li class="active">Crear</li>
    </ol>
@stop

@section('contenido')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Crear Nota de Pedido</h3>
                </div>
                <div class="box-body">
                    @include('admin.layout.mensaje')

                    {{ Form::open(['url' => 'admin/nota-pedido/guardar', 'method' => 'POST']) }}
                    <div class="form-group">
                        {{ Form::label('idProveedor', 'Proveedor') }}
                        {{ Form::select('idProveedor', $proveedor, null, ['class' => 'form-control']) }}
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <table class="table table-bordered table-hover factura">
                                <thead>
                                <tr>
                                    <th width="15%">Codigo</th>
                                    <th width="58%">Descripcion</th>
                                    <th width="25%">Cantidad</th>
                                    <th width="2%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <input type="text" name="producto[1][codigo]" id="codigo_1" class="form-control"
                                               autocomplete="off">
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="producto[1][concepto]" id="concepto_1"
                                                   class="form-control" autocomplete="off">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#productoModal" data-id="1">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" name="producto[1][cantidad]" id="cantidad_1"
                                               class="form-control cambio" autocomplete="off"
                                               onkeypress="return IsNumeric(event);" ondrop="return false;"
                                               onpaste="return false;">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger eliminar"
                                                title="Quitar concepto">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <button class="btn btn-success agregar" type="button" style="margin-top: 10px;">
                                <i class="fa fa-plus"></i> Agregar
                            </button>
                        </div>
                        <div class="col-xs-12 text-center">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Guardar
                            </button>
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    @include('admin.nota-pedido.modal')

@stop

@section('script')
    <script>
        var idBoton = 0;

        /* Inicio Abrir Modal */
        $('#productoModal').on('show.bs.modal', function (e) {
            var btn = e.relatedTarget;
            idBoton = $(btn).data('id');
        })
        /* Fin Abri Modal */


        /* Inicio Paginacion Ajax */
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();

            var pagina = $(this).attr('href').split('page=')[1];

            getProductos(pagina);
        });

        function getProductos(pagina) {
            var url = '{{ url('admin/nota-pedido/producto?page=') }}' + pagina;

            $.get(url, function (data) {
                $('.modal-body').html(data);
            });
        }
        /* Fin Paginacion Ajax */


        /* Seleccionar Producto */
        $(document).on('click', '.seleccionar-producto', function () {
            var btn = $(this);
            var idProducto = $(btn).data('id');

            if (idProducto) {
                seleccionarProducto(idProducto, btn);
            }

        });

        function seleccionarProducto(idProducto, btn) {
            if (btn) {
                $(btn).prop('disabled', true);
            }

            var url = '{{ url('admin/nota-pedido/seleccionar-producto/') }}';

            $.ajax({
                url: url,
                type: 'POST',
                data: {id: idProducto},
                success: function (datos) {
                    if (btn) {
                        $(btn).prop('disabled', false);
                    }

                    if (datos.success) {
                        $('#productoModal').modal('hide');

                        var producto = datos.data;

                        $('#codigo_' + idBoton).val(producto.id);
                        $('#concepto_' + idBoton).val(producto.nombre);
                        $('#precio_' + idBoton).val(producto.precio);
                        $('#cantidad_' + idBoton).val(1);
                    }
                }
            });
        }
        /* Fin Seleccionar Producto */


        /* Agregar Fila */
        var nroFila = $('table.factura tr').length;

        $(document).on('click', '.agregar', function () {
            var fila = '<tr>' +
                    '<td>' +
                    '<input type="text" name="producto[' + nroFila + '][codigo]" id="codigo_' + nroFila + '" class="form-control" autocomplete="off">' +
                    '</td>' +
                    '<td>' +
                    '<div class="input-group">' +
                    '<input type="text" name="producto[' + nroFila + '][concepto]" id="concepto_' + nroFila + '" class="form-control" autocomplete="off">' +
                    '<div class="input-group-btn">' +
                    '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productoModal" data-id="' + nroFila + '">' +
                    '<i class="fa fa-search"></i>' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="producto[' + nroFila + '][cantidad]" id="cantidad_' + nroFila + '" class="form-control cambio" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">' +
                    '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-sm btn-danger eliminar" title="Quitar concepto"><i class="fa fa-remove"></i> </button>' +
                    '</td>' +
                    '</tr>';

            $('table.factura').append(fila);

            nroFila++;
        });
        /* Fin Agregar Fila*/



        /* Eliminar Fila */
        $(document).on('click', '.eliminar', function () {
            $(this).parent().parent().remove();
            calcularTotal();
        });
        /* Fin Eliminar Fila */


        /* Calcular Sub Total */
        $(document).on('change keyup blur', '.cambio', function () {
            var idArray = $(this).attr('id');
            var id = idArray.split('_');
            var cantidad = $('#cantidad_' + id[1]).val();
            var precio = $('#precio_' + id[1]).val();

            if (cantidad != '' && precio != '') {
                $('#total_' + id[1]).val((parseFloat(precio) * parseFloat(cantidad)).toFixed(2));
            }

            calcularTotal();
        });

        /* Fin Calcular Sub Total */


        /* Calcular Impuesto */

        $(document).on('change keyup blur', '#impuesto', function () {
            calcularTotal();
        });

        /* Fin Calcular Impuesto */


        /* Calcular Total */

        function calcularTotal() {
            var subTotal = 0;
            var total = 0;

            $('.totalPrecio').each(function () {
                if ($(this).val() != '') {
                    subTotal += parseFloat($(this).val());
                }
            });

            $('#subTotal').val(subTotal.toFixed(2));

            var impuesto = $('#impuesto').val();

            if (impuesto != '' && typeof(impuesto) != 'undefined') {
                var importeImpuesto = subTotal * ( parseFloat(impuesto) / 100 );

                $('#importeImpuesto').val(importeImpuesto.toFixed(2));

                total = subTotal + importeImpuesto;
            } else {
                $('#importeImpuesto').val(0);

                total = subTotal;
            }

            $('#total').val(total.toFixed(2));
        }

        /* Fin Calcular Total */





        /* Funciones */
        /* Se restringen los que no son numeros */
        var specialKeys = new Array();
        specialKeys.push(8, 46); //Barra Espaciadora

        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode;
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            return ret;
        }
    </script>
@stop