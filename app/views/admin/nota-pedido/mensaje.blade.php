@extends('web.layout.default')

@section('contenido')

    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="content-404">
                <h1>
                    <b>PRESUPUESTO GUARDADO CON EXITO</b>
                </h1>
                <p>
                    Cliente: {{Auth::user()->apellido.' '.Auth::user()->nombre}}
                </p>
                <p>
                    Nro.de Presupuesto:{{$presupuesto->id}}
                </p>
                <p>
                    Fecha del Presupuesto:{{ucwords(Date::parse($presupuesto->fechaPedido)->format('d F Y'))}}
                </p>
                <p>
                    ¿Que deseas hacer?
                </p>

                <h2>
                    <a href="{{ url('/') }}">Volver al Inicio</a>
                </h2>
                <h2>
                    <a href="{{ url('carrito/imprimir/presupuesto/'). '/' . $presupuesto->id }}">Imprimir
                        Presupuesto</a>
                </h2>
            </div>
        </div>
    </div>

@stop
