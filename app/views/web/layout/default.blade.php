<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>La Agropecuaria</title>

	@include('web.layout.estilo')

	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
	<header id="header">
		@include('web.layout.cabecera-arriba')

		@include('web.layout.cabecera-medio')

		@include('web.layout.cabecera-abajo')
	</header>

	@yield('slider')

	<section>
		<div class="container">

			@yield('contenido')

		</div>
	</section>

	<footer id="footer">
		@include('web.layout.pie-arriba')

		@include('web.layout.pie-medio')

		@include('web.layout.pie-abajo')
	</footer>

	@include('web.layout.script')

	@yield('script')
</body>
</html>
