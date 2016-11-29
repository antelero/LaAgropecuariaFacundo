@extends('admin.layout.default')

@section('migasPan')
    <h1>
        Nota de Pedido
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><a href="">Nota de Pedido</a></li>
    </ol>
@stop

@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Listado de Notas de Pedido</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ url('admin/nota-pedido/nueva') }}" class="btn btn-primary blanco">Nuevo</a>
                    </div>
                </div>
                <div class="box-body no-padding">

                    @include('admin.layout.mensaje')

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Proveedor</th>
                            <th>Usuario</th>
                            <th>Fecha del Pedido</th>
                            <th>Fecha de Recepcion del Pedido</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @if ($notasPedido->count() != 0)

                            @foreach ($notasPedido as $notaPedido)
                                <tr>
                                    <td>{{ $notaPedido->id }}</td>
                                    <td>{{ $notaPedido->proveedor->nombre}}</td>
                                    <td>{{ $notaPedido->user->nombre}}</td>
                                    <td>{{ucwords(Date::parse($notaPedido->fechaPedido)->format('d F Y'))}}</td>
                                    <td>{{ucwords(Date::parse($notaPedido->fechaRecepcion)->format('d F Y'))}}</td>
                                    <td>
                                        <small class="{{ ($notaPedido->estado == 1) ? 'label label-pill label-success' : 'label label-pill label-danger' }}">{{ $notaPedido->estado_nota_pedido }}</small>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/nota-pedido/'. $notaPedido->id) }}" class="btn btn-info">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="text-center">
                                    <h4><strong>No se encontraron registros</strong></h4>
                                </td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
