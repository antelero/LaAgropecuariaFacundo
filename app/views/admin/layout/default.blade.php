<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

	<title>La Agropecuaria - Administracion</title>

	@include('admin.layout.estilo')

</head>

<body class="skin-blue">

	@include('admin.layout.cabecera')

	<div class="wrapper row-offcanvas row-offcanvas-left">

		@include('admin.layout.menu')

		<aside class="right-side">
			<section class="content-header">
                @yield('migasPan')
            </section>

            <section class="content">
            	@yield('contenido')
            </section>
		</aside>

	</div>

	@include('admin.layout.script')

	@yield('script')

</body>
</html>
