@if (Session::has('exito'))
	<div class="alert alert-success alert-dismissable">
		<i class="fa fa-check"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>Exito!</b> {{ Session::get('exito') }}
	</div>
@endif

@if (Session::has('error'))
	<div class="alert alert-danger alert-dismissable">
		<i class="fa fa-check"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>Error!</b> {{ Session::get('error') }}
	</div>
@endif


@if ($errors->has())
	<div class="alert alert-danger alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>Por favor corrige los siguentes errores:</b>
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
@endif