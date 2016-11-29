@extends('web.layout.default')

@section('contenido')

	<div class="row">
		<div class="col-sm-3">
			<div class="menu-perfil">
				@include('web.cuenta.sidebar')
			</div>
		</div>

		<div class="col-sm-9">
			<div class="features_items my-account-page">
				<h2 class="title text-center">Consulta</h2>
					<div class="col-sm-12 text-left" style="font-size:120%">
						<p># En esta seccion podra realizar cualquier tipo de consultas, ya sea sobre los servicios que brindamos, productos disponibles,no disponibles y cualquier tipo de duda relacionada con nuestra empresa.</p>
						<p># Podra realizar un seguimiento de sus consultas, desde la primera hasta la última consulta realizada.</p>
						<div class="text-center">
							<tr>
								<td>
									<a class="btn btn-success btn-lg" href="{{url('consulta/crear')}}">
										<i class="fa fa-paper-plane fa-lg fa-align-center">		Realizar Consulta</i>
									</a>
								</td>

								<td>
									<a class="btn btn-success btn-lg" href="{{url('consulta/ver')}}">
										<i class="fa fa-archive fa-lg fa-align-center">		Ver Consultas Anteriores</i>
									</a>
								</td>
							</tr>
						</div>

					</div>
			</div>
		</div>
	</div>

@stop
