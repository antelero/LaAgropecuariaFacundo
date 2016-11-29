<!DOCTYPE html>
<html class="bg-black">
	<head>
		<meta charset="UTF-8">
		<title>La Agropecuaria - Login</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

		<link href="{{ asset('assets/admin/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/admin/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

		<!-- Theme style -->
		<link href="{{ asset('assets/admin/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="bg-black">

		<div class="form-box">
			<div class="header">
				La Agropecuaria - Login
			</div>

			{{ Form::open() }}
			<div class="body bg-gray">

				@if (Session::has('mensaje'))
					<p class="text-red">
						<strong>{{ Session::get('mensaje') }}</strong>
					</p>
				@endif

				<div class="form-group has-error">
					{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Ingrese su email')) }}
					{{ $errors->first('email', '<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') }}
				</div>

				<div class="form-group has-error">
					{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Ingrese su contraseña')) }}
					{{ $errors->first('password', '<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') }}
				</div>

				<div class="form-group">
					{{ Form::checkbox('recordarme', null, false) }} Recordarme
				</div>
			</div>

			<div class="footer">
				<button type="submit" class="btn bg-olive btn-block">Ingresar</button>
			</div>
			{{ Form::close() }}

		</div>

		<script src="{{ asset('assets/admin/js/jQuery/jquery-2.1.3.min.js') }}"></script>
		<script src="{{ asset('assets/admin/js/bootstrap/bootstrap.min.js') }}" type="text/javascript"></script>

	</body>
</html>
