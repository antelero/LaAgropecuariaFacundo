<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Orden de Compra</title>

	<style type="text/css" media="screen">
	body {
		width: 100%;
		background: #FFFFFF;
		font-size: 14px;
		font-family: Arial;
	}

	table {
		border-collapse: collapse;
		margin-top: 20px;
		width: 100%;
	}

	table, th, td {
		padding: 5px;
	}

	.cuadrado {
		border: 1px solid black;
	}

	.bordeBlanco {
		border: 0px;
	}

	.padding0 {
		padding: 0px;
	}

	.padding15 {
		padding: 15px 5px;
	}

	.derecha {
		text-align: right;
	}

	.izquierda {
		text-align: left;
	}

	.gris {
		background: #eee;
	}

	.width300 {
		width: 300px;
	}

	.width60 {
		width: 60%;
	}

	.width50 {
		width: 50%;
	}

	.width40 {
		width: 40%;
	}

	.width20 {
		width: 20%;
	}

	.width15 {
		width: 15%;
	}

	#header {
		height: 15px;
		width: 100%;
		margin: 20px 0;
		background: #222;
		text-align: center;
		color: white;
		font: bold 15px Helvetica, Sans-Serif;
		text-decoration: uppercase;
		letter-spacing: 20px;
		padding: 8px 0px;
	}

	#logo img {
		margin-top: 25px;
		width: 250px;
	}

	#termino {
		text-align: center;
		margin: 20px 0px 0px 0px;
	}

	#termino h5 {
		text-transform: uppercase;
		font: 13px Helvetica, Sans-Serif;
		letter-spacing: 10px;
		border-bottom: 1px solid black;
		padding: 0 0 8px 0;
		margin: 100px 0 0 0;
	}
	</style>


</head>

<body>
	<table>
		<tr>
			<td id="header" colspan="2">ORDEN DE COMPRA</td>
		</tr>

		<tr>
			<td class="width50">
				Jose de la Iglesia N° 1591 , CP 4600<br>
				S.S. de Jujuy - Jujuy - Argentina<br>
				Telefono: +54 (0388) 423-1654<br>
				Gerente Comercial: +54 (0388) 154-041-444<br>
			</td>
			<td class="derecha width50" id="logo">
				<img src="{{ asset('assets/web/images/home/LogoAgropecuariaChiquito.png') }}" alt="Logo">
			</td>
		</tr>

		<tr>
			<td height="120"></td>
			<td class="derecha width40 padding0">
				<table align="right" class="width300 cuadrado">
					<tr>
						<td class="gris izquierda width50 cuadrado">N° de Orden de Compra</td>
						<td class="cuadrado">{{$imprimir->id}}</td>
					</tr>
					<tr>
						<td class="gris izquierda width50 cuadrado">Nombre del Cliente</td>
						<td class="cuadrado">{{$imprimir->user->apellido .' '. $imprimir->user->nombre}}</td>
					</tr>
					<tr>
						<td class="gris izquierda cuadrado">Fecha Actual</td>
						<td class="cuadrado">{{ date("d/m/Y", strtotime($fechaOriginal)) }}</td>
					</tr>
					<tr>
						<td class="gris izquierda cuadrado">Fecha Valida</td>
						<td class="cuadrado">{{ date("d/m/Y", strtotime($fechaVencimientoOriginal)) }}</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="padding0">
				<table>
					<thead class="gris">
						<tr>
							<th class="cuadrado">Descripcion</th>
							<th class="width15 cuadrado">Cantidad</th>
							<th class="width15 cuadrado">Precio</th>
							<th class="width15 cuadrado">Descuento</th>
							<th class="width15 cuadrado">Sub Total</th>
						</tr>
					</thead>
					<tbody>

					@foreach($detalles as $producto)
						@if ($producto->ordenCompra->id == $imprimir->id)
							<tr>
								<td class="cuadrado">{{$producto->producto->nombre}}</td>
								<td class="cuadrado">{{$producto->cantidad}}</td>
								<td class="cuadrado">{{$producto->precio}}</td>
								<td class="cuadrado">{{$producto->descuento}}</td>
								<td class="cuadrado">{{ number_format(($producto->precio - $producto->descuento) * $producto->cantidad, 2, ',', '.' ) }}</td>

							</tr>
						@endif
					@endforeach



						<tr class="bordeBlanco">
							<td colspan="2"> </td>
							<td class="cuadrado derecha">Sub Total</td>
							<td class="cuadrado">$ {{ number_format( $imprimir->total, 2, ',', '.' ) }}</td>
						</tr>
						<tr>
							<td colspan="2"> </td>
							<td class="cuadrado derecha">Descuento</td>
							<td class="cuadrado">$ 0.00</td>
						</tr>
						<tr>
							<td colspan="2"> </td>
							<td class="cuadrado gris derecha">Total</td>
							<td class="cuadrado gris">$ {{ number_format( $imprimir->total, 2, ',', '.' ) }}</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr id="termino">
			<td colspan="2" id="termino">
				<h5>Terminos</h5>
				<div>Valido por 2 dias desde la fecha que se realizo la Orden de Compra</div>
			</td>
		</tr>
	</table>

</body>
</html>
