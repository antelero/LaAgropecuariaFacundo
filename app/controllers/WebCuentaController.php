<?php

class WebCuentaController extends BaseController
{
    public function index()
    {
        return View::make('web.cuenta.index');
    }

    public function crear()
    {
        return View::make('web.cuenta.crear');
    }

    public function guardar()
    {
        $datos = Input::all();

        $reglas = array(
            'nombre'                => 'required|max:50|min:3',
            'apellido'              => 'required|max:50|min:3',
            'fechaNacimiento'       => 'required|date|before:18 years ago',
            'email'                 => 'required|max:50|email|unique:clientes_web',
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required|',
        );

        $mensajeRegla = array('before' => 'Debe tener por lo menos 18 años de edad');

        $validar = Validator::make($datos, $reglas, $mensajeRegla);

        if ($validar->passes()) {
            $nombre          = Input::get('nombre');
            $apellido        = Input::get('apellido');
            $fechaNacimiento = Input::get('fechaNacimiento');
            $email           = Input::get('email');
            $password        = Input::get('password');

            // Codigo de activacion
            $codigoActivacion = str_random(60);

            $datosUsuario = array(
                'nombre'           => $nombre,
                'apellido'         => $apellido,
                'fechaNacimiento'  => $fechaNacimiento,
                'email'            => $email,
                'password'         => Hash::make($password),
                'codigoActivacion' => $codigoActivacion,
                'idProvincia'      => 9,
            );

            $datosEmail = array('link' => url('cuenta/activar/' . $codigoActivacion)) + $datosUsuario;

            //dd($datosEmail);

            $usuario = User::create($datosUsuario);

            if ($usuario) {
                $fromEmail  = 'laagropecuariajujuy@gmail.com';
                $fromNombre = 'La Agropecuaria';

                Mail::send('web.cuenta.email-activacion', $datosEmail, function ($mensaje) use ($fromEmail, $fromNombre) {
                    $mensaje->from($fromEmail, $fromNombre);
                    $mensaje->to(Input::get('email'), Input::get('apellido') . ' ' . Input::get('nombre'));
                    $mensaje->subject('Activa tu cuenta de La Agropecuaria');
                });
            }

            $mensajeVista = array(
                'titulo'  => 'Su cuenta ha sido creada!',
                'mensaje' => 'Te hemos enviado un correo electrónico para activar tu cuenta.',
            );

            return View::make('web.cuenta.mensaje', compact('mensajeVista'));
        } else {
            return Redirect::back()->withInput()->withErrors($validar);
        }
    }

    public function activar($codigo)
    {
        $usuario = User::where('codigoActivacion', $codigo)->where('estado', 0)->first();

        if ($usuario->count() != 0) {

            // Actualización de usuario para estado activo
            $usuario->estado           = 1;
            $usuario->codigoActivacion = '';

            if ($usuario->save()) {
                $mensajeVista = array(
                    'titulo'  => 'Activaste tu cuenta!',
                    'mensaje' => 'Ahora puede iniciar sesión.',
                );
            } else {
                $mensajeVista = array(
                    'titulo'  => 'No hemos podido activar tu cuenta!',
                    'mensaje' => 'Inténtalo de nuevo más tarde.',
                );
            }
        } else {
            $mensajeVista = array(
                'titulo'  => 'Hubo un problema!',
                'mensaje' => 'Su cuenta ya a sido activada o el codigo de activacion no corresponde.',
            );
        }

        return View::make('web.cuenta.mensaje', compact('mensajeVista'));
    }

    public function recuperarPassword()
    {
        return View::make('web.cuenta.recuperar-password');
    }

    public function recuperarPasswordGuardar()
    {
        $datos = Input::all();

        $reglas = array(
            'email' => 'required|exists:clientes_web,email,deleted_at,NULL',
        );

        $mensajeRegla = array('exists' => 'No podemos encontrar un usuario con ese e-mail.');

        $validar = Validator::make($datos, $reglas, $mensajeRegla);

        if ($validar->passes()) {
            $usuario = User::where('email', Input::get('email'))->first();

            if ($usuario->count()) {
                $codigoActivacion = str_random(60);
                $passwordTemporal = str_random(10);

                $usuario->codigoActivacion = $codigoActivacion;
                $usuario->passwordTemporal = Hash::make($passwordTemporal);

                $datosEmail = array(
                    'link'             => url('cuenta/activar-password/' . $codigoActivacion),
                    'nombreCompleto'   => $usuario->nombre_completo,
                    'passwordTemporal' => $passwordTemporal,
                );

                if ($usuario->save()) {
                    $fromEmail  = 'laagropecuariajujuy@gmail.com';
                    $fromNombre = 'La Agropecuaria';

                    Mail::send('web.cuenta.email-activacion-password', $datosEmail, function ($mensaje) use ($fromEmail, $fromNombre, $usuario) {
                        $mensaje->from($fromEmail, $fromNombre);
                        $mensaje->to($usuario->email, $usuario->nombre_completo);
                        $mensaje->subject('Su nueva contraseña de La Agropecuaria');
                    });
                }

                $mensajeVista = array(
                    'titulo'  => 'Su contraseña ha sido creada!',
                    'mensaje' => 'Te hemos enviado un correo electrónico con una nueva contraseña.',
                );

                return View::make('web.cuenta.mensaje', compact('mensajeVista'));
            }
        } else {
            return Redirect::back()->withInput()->withErrors($validar);
        }
    }

    public function activarPassword($codigo)
    {
        $usuario = User::where('codigoActivacion', $codigo)->where('passwordTemporal', '!=', '')->first();

        if ($usuario->count()) {
            $usuario->password         = $usuario->passwordTemporal;
            $usuario->passwordTemporal = '';
            $usuario->codigoActivacion = '';

            if ($usuario->save()) {
                $mensajeVista = array(
                    'titulo'  => 'Activaste tu contraseña!',
                    'mensaje' => 'Su nueva contraseña ha sido activada, ya puede iniciar sesión.',
                );
            } else {
                $mensajeVista = array(
                    'titulo'  => 'No hemos podido activar tu contraseña!',
                    'mensaje' => 'Inténtalo de nuevo más tarde.',
                );
            }
        } else {
            $mensajeVista = array(
                'titulo'  => 'Hubo un problema!',
                'mensaje' => 'Su contraseña ya a sido activada o el codigo de activacion no corresponde.',
            );
        }

        return View::make('web.cuenta.mensaje', compact('mensajeVista'));
    }
}
