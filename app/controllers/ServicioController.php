<?php

class ServicioController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $servicios = Servicio::all();
        return View::make('admin.servicio.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.servicio.create');
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
            'nombre' => 'required',
            'precio' => 'numeric',
            'imagen' => 'image|mimes:png,gif,jpeg,jpg|max:1000',
        );

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {
            $nombre = ucwords($datos['nombre']);

            $servicio = new Servicio();

            $servicio->nombre  = $nombre;
            $servicio->detalle = $datos['detalle'];
            $servicio->precio  = $datos['precio'];

            if (Input::hasFile('imagen')) {
                $archivoImagen        = Input::file('imagen');
                $extensionImagen      = strtolower($archivoImagen->getClientOriginalExtension());
                $nombreServicioImagen = preg_replace('([^A-Za-z0-9])', '', $nombre);
                $nombreImagen         = $nombreServicioImagen . '.' . $extensionImagen;
                $rutaImagen           = public_path('assets/imagen/servicio/' . $nombreImagen);

                // Creamos el objeto Image
                $imagen = Image::make($archivoImagen);

                // Lo redimensionamos
                $imagen->resize(180, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                // Verificamos si existe el directorio 'assets/imagen/vino/'
                if (!File::isDirectory(public_path('assets/imagen/servicio/'))) {
                    // Si no existe lo creamos con los correspondientes permisos
                    File::makeDirectory(public_path('assets/imagen/servicio/'), 0775, true);
                }

                // Lo subimos al directorio
                $imagen->save($rutaImagen);

                $servicio->imagen = $nombreImagen;
            }

            $servicio->save();

            return Redirect::to('admin/servicio')->with('exito', 'El servicio fue creado');
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
        $servicio = Servicio::find($id);

        return View::make('admin.servicio.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
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
