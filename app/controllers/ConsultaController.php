<?php

class ConsultaController extends BaseController
{
     public function index()
    {
        $consultas = Consulta::all();
        //dd($consultas);
        return View::make('admin.consulta.index', compact('consultas'));
    }

    public function responder($id)
    {
        $consulta = Consulta::find($id);

        return View::make('admin.consulta.responder', compact('consulta'));
    }

    public function guardar($id)
    {
        $datos = Input::all();

        $reglas = array(
            'respuesta'         => 'required',

        );

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {

            $consulta = Consulta::find($id);

            $consulta->respuesta        = $datos['respuesta'];
            $consulta->fechaRespuesta   = $datos['fechaRespuesta'];
            $consulta->estado           = $datos['estado'];

            $consulta->save();

            return Redirect::to('admin/consulta/responder/'. $consulta->id)->with('exito', 'Se ha respondido la consulta con exito');
        } else {
            return Redirect::back()->withInput()->withErrors($validar);
        }
    }
}
