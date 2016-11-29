@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Publicidad <small>Listado</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active"><a href="">Publicidad</a></li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Listado de Publicidades</h3>
				<div class="box-tools pull-right">
					<a href="{{ url('admin/publicidad/create') }}" class="btn btn-primary blanco">Nuevo</a>
				</div>
			</div>
			<div class="box-body no-padding">

				@include('admin.layout.mensaje')

				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Ubicacion</th>>
							<th>Pagina</th>
							<th>Imagen</th>
							<th></th>
						</tr>
					</thead>
					<tbody>

					@if ($publicidades->count() != 0)

						@foreach ($publicidades as $publicidad)

						<tr>
							<td>{{ $publicidad->id }}</td>
							<td>{{ $publicidad->nombre }}</td>
							<td>{{ $publicidad->ubicacion }} lugar</td>
							<td>{{ $publicidad->link }} </td>
							<td>
								@if ($publicidad->imagen)
									<img src="{{ asset('assets/imagen/publicidad/' . $publicidad->imagen) }}" height="25%" alt="{{ $publicidad->nombre }}">
								@else
									<img src="{{ asset('assets/admin/img/ImagenVino.jpg') }}" height="25%" alt="Imagen de la Publicidad">
								@endif
							</td>
							<td>
								<a href="{{ url('admin/publicidad/' . $publicidad->id) }}" class="btn btn-info">
									<i class="fa fa-search-plus"></i>
								</a>
								<a href="{{ url('admin/publicidad/' . $publicidad->id . '/edit') }}" class="btn btn-warning">
									<i class="fa fa-pencil"></i>
								</a>
							@if (Auth::user()->tipo == 'admin')
								<a href="{{ url('admin/publicidad/' . $publicidad->id) }}" class="btn btn-danger" data-method="DELETE" data-confirm="¿Esta seguro que desea eliminar la publicidad?">
									<i class="fa fa-times"></i>
								</a>
							@endif
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
