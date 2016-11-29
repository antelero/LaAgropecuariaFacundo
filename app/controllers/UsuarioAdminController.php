<?php

class UsuarioAdminController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $usuarios = User::where('id', '<>', Auth::id())->take(10)->get();

        return View::make('admin.usuario.index', compact('usuarios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $opcionProvincia = Provincia::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $provincia       = array('' => 'Seleccione la Provincia') + $opcionProvincia;

        return View::make('admin.usuario.create', compact('provincia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $datos = Input::all();

        $reglas = array(
            'email'                 => 'required|email|unique:clientes_web',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required',
            'tipo'                  => 'required|in:admin,usuario,cliente',
            'estado'                => 'required|boolean',
            'nombre'                => 'alpha',
            'apellido'              => 'alpha',
            'dni'                   => 'numeric|digits_between:7,8',
            'fechaNacimiento'       => 'date',
            'idProvincia'           => 'required|exists:provincias,id',
            'avatar'                => 'image|mimes:png,gif,jpeg,jpg|max:1000',
        );

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {
            $nombre   = ucwords(Input::get('nombre'));
            $apellido = ucwords(Input::get('apellido'));

            $usuario = new User();

            $usuario->email    = Input::get('email');
            $usuario->password = Hash::make(Input::get('password'));
            $usuario->estado   = Input::get('estado');
            $usuario->tipo     = Input::get('tipo');

            if (Input::get('tipo') == 'admin' or Input::get('tipo') == 'usuario') {
                $usuario->empleado = 1;
            } else {
                $usuario->empleado = 0;
            }

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

                // Lo subimos al directorio
                $imagen->save($rutaImagen);

                $usuario->avatar = $nombreImagen;
            }

            $usuario->save();

            return Redirect::to('admin/usuario')->with('exito', 'El usuario fue creado');
        } else {
            return Redirect::back()->withInput()->withErrors($validar);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $usuario = User::find($id);

        return View::make('admin.usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);

        $opcionProvincia = Provincia::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $provincia       = array('' => 'Seleccione la Provincia') + $opcionProvincia;

        return View::make('admin.usuario.edit', compact('usuario', 'provincia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $datos = Input::all();

        $reglas = array(
            'email'           => 'required|email|unique:clientes_web,email,' . $id,
            'password'        => 'confirmed',
            'tipo'            => 'required|in:admin,usuario,cliente',
            'estado'          => 'required|boolean',
            'nombre'          => 'alpha',
            'apellido'        => 'alpha',
            'dni'             => 'numeric|digits_between:7,8',
            'fechaNacimiento' => 'date',
            'idProvincia'     => 'required|exists:provincias,id',
            'avatar'          => 'image|mimes:png,gif,jpeg,jpg|max:1000',
        );

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {
            $nombre   = ucwords(Input::get('nombre'));
            $apellido = ucwords(Input::get('apellido'));

            $usuario = User::find($id);

            $usuario->email = Input::get('email');

            if (!empty(Input::get('password'))) {
                $usuario->password = Hash::make(Input::get('password'));
            }

            $usuario->estado = Input::get('estado');
            $usuario->tipo   = Input::get('tipo');

             if (Input::get('tipo') == 'admin' or Input::get('tipo') == 'usuario') {
                $usuario->empleado = 1;
            } else {
                $usuario->empleado = 0;
            }

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

            return Redirect::to('admin/usuario')->with('exito', 'El usuario fue actualizado');
        } else {
            return Redirect::back()->withInput()->withErrors($validar);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
