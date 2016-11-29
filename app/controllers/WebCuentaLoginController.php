<?php

class WebCuentaLoginController extends BaseController
{
    public function index()
    {
        return View::make('web.cuenta.login.index');
    }

    public function login()
    {
        $datos = Input::all();

        $reglas = array(
            'email'    => 'required|email',
            'password' => 'required',
        );

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {
            $recordarme = (Input::has('recordarme')) ? true : false;

            $credenciales = array(
                'email'    => Input::get('email'),
                'password' => Input::get('password'),
                'estado'   => 1,
            );

            $login = Auth::attempt($credenciales, $recordarme);

            if ($login) {
                return Redirect::intended('/');
            } else {
                return Redirect::to('cuenta/login')->with('mensaje', 'E-Mail/Contraseña incorrectos.');
            }
        } else {
            return Redirect::back()->withInput()->withErrors($validar);
        }
    }

    public function logout()
    {
        Auth::logout();

        return Redirect::to('/');
    }
}
