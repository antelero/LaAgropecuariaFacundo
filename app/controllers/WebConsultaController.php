<?php

class WebConsultaController extends BaseController
{
    public function index()
    {
        return View::make('web.consulta.index');
    }

    public function create()
    {
        return View::make('web.consulta.create');
    }

    public function store()
    {
        $datos = Input::all();

        $reglas = array(
        	'asunto'		  => 'required',
            'detalle'         => 'required',
        );

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {

            $consulta = new Consulta();

            $consulta->fechaConsulta	  = $datos['fechaConsulta'];
            $consulta->asunto	          = $datos['asunto'];
            $consulta->detalle            = $datos['detalle'];
            $consulta->estado             = $datos['estado'];
            $consulta->idCliente          = $datos['idCliente'];

            $consulta->save();

            return Redirect::to('consulta/crear')->with('exito', 'La consulta ha sido realizada con exito');
        } else {
            return Redirect::back()->withInput()->withErrors($validar);
        }

    }

     public function indexConsulta()
    {
        $consultas = Consulta::all();
        //dd($consultas);
        return View::make('web.consulta.indexConsulta', compact('consultas'));
    }

    public function verConsulta($id)
    {
        $consulta = Consulta::find($id);
        return View::make('web.consulta.show', compact('consulta'));
    }


}
