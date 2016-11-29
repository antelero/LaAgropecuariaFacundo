<?php

class WebCuentaPerfilController extends BaseController
{
    public function index()
    {
        return View::make('web.cuenta.perfil.index');
    }

    public function editar()
    {
        $opcionProvincia = Provincia::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $provincia       = array('' => 'Seleccione la Provincia') + $opcionProvincia;

        return View::make('web.cuenta.perfil.editar', compact('provincia'));
    }

    public function actualizar()
    {
        $datos = Input::all();

        $reglas = array(
            'nombre'          => 'required|max:50|min:3',
            'apellido'        => 'required|max:50|min:3',
            'email'           => 'required|email|unique:usuarios,email,' . Auth::id(),
            'dni'             => 'numeric|digits_between:7,8',
            'fechaNacimiento' => 'date',
            'idProvincia'     => 'required|exists:provincias,id',
            'avatar'          => 'image|mimes:png,gif,jpeg,jpg|max:1000',
        );

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {
            $nombre   = ucwords(Input::get('nombre'));
            $apellido = ucwords(Input::get('apellido'));

            $usuario = User::find(Auth::id());

            $usuario->idProvincia     = Input::get('idProvincia');
            $usuario->email           = Input::get('email');
            $usuario->nombre          = $nombre;
            $usuario->apellido        = $apellido;
            $usuario->dni             = Input::get('dni');
            $usuario->fechaNacimiento = Input::get('fechaNacimiento');
            $usuario->direccion       = Input::get('direccion');
            $usuario->localidad       = Input::get('localidad');
            $usuario->telefono        = Input::get('telefono');

            if (Input::hasFile('avatar')) {
                $archivoImagen = Input::file('avatar');

                $nombreImagenListo = Input::get('email');

                // Datos del anterior archivo de imagen
                $nombreImagenAnterior = $usuario->avatar;
                $rutaImagenAnterior   = public_path('assets/imagen/usuario/' . $nombreImagenAnterior);

                $extensionImagen     = strtolower($archivoImagen->getClientOriginalExtension());
                $nombreUsuarioImagen = preg_replace('([^A-Za-z0-9])', '', $nombreImagenListo);
                $nombreImagen        = $nombreUsuarioImagen . '.' . $extensionImagen;
                $rutaImagen          = public_path('assets/imagen/usuario/' . $nombreImagen);

                // Creamos el objeto Image
                $imagen = Image::make($archivoImagen);

                // Lo redimensionamos
                $imagen->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                // Verificamos si no existe el directorio
                if (!File::isDirectory(public_path('assets/imagen/usuario/'))) {
                    // Creamos el directorio
                    File::makeDirectory(public_path('assets/imagen/usuario/'), 0775, true);
                }

                // Verificamos si existe el archivo
                if (File::exists($rutaImagenAnterior)) {
                    // Eliminamos el anterior archivo
                    File::delete($rutaImagenAnterior);
                }

                // Lo subimos al directorio
                $imagen->save($rutaImagen);

                $usuario->avatar = $nombreImagen;
            }

            $usuario->save();

            return Redirect::to('cuenta/perfil')->with('exito', 'Sus datos fueron atualizados con exito');
        } else {
            return Redirect::back()->withInput()->withErrors($validar);
        }
    }

    public function editarPassword()
    {
        return View::make('web.cuenta.perfil.cambiar-password');
    }

    public function actualizarPassword()
    {
        $datos = Input::all();

        $reglas = array(
            'passwordAnterior'      => 'required',
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required|',
        );

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {
            $passwordActualInput = Input::get('passwordAnterior');
            $passwordActual      = Auth::user()->password;

            if (Hash::check($passwordActualInput, $passwordActual)) {
                $usuario           = User::find(Auth::id());
                $usuario->password = Hash::make(Input::get('password'));
                $usuario->save();

                return Redirect::to('cuenta/perfil')->with('exito', 'La contraseña se actualizo');
            } else {
                return Redirect::back()->with('error', 'La contraseña que ingreso es incorrecta');
            }
        } else {
            return Redirect::back()->withInput()->withErrors($validar);
        }
    }
}
