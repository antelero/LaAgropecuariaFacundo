<?php

class PublicidadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        $publicidades = Publicidad::all();

        return View::make('admin.publicidad.index', compact('publicidades'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $publicidad = Publicidad::all();
        return View::make('admin.publicidad.create', compact('publicidad'));
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
            'nombre'         => 'required',
            'ubicacion'      => 'required',
            'link'           => 'required',
            'imagen'         => 'image|mimes:png,gif,jpeg,jpg|max:1000',
        );

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {
            $nombre = ucwords($datos['nombre']);

            $publicidad = new Publicidad();

            $publicidad->nombre       = $nombre;
            $publicidad->detalle      = $datos['detalle'];
            $publicidad->ubicacion    = $datos['ubicacion'];
            $publicidad->link         = $datos['link'];

            if (Input::hasFile('imagen')) {
                $archivoImagen        = Input::file('imagen');
                $extensionImagen      = strtolower($archivoImagen->getClientOriginalExtension());
                $nombrePublicidadImagen = preg_replace('([^A-Za-z0-9])', '', $nombre);
                $nombreImagen         = $nombrePublicidadImagen . '.' . $extensionImagen;
                $rutaImagen           = public_path('assets/imagen/publicidad/' . $nombreImagen);

                // Creamos el objeto Image
                $imagen = Image::make($archivoImagen);

                // Lo redimensionamos
                $imagen->resize(180, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                // Verificamos si existe el directorio 'assets/imagen/vino/'
                if (!File::isDirectory(public_path('assets/imagen/publicidad/'))) {
                    // Si no existe lo creamos con los correspondientes permisos
                    File::makeDirectory(public_path('assets/imagen/publicidad/'), 0775, true);
                }

                // Lo subimos al directorio
                $imagen->save($rutaImagen);

                $publicidad->imagen = $nombreImagen;
            }

            $publicidad->save();

            return Redirect::to('admin/publicidad')->with('exito', 'La publicidad fue creada');
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
        $producto = Producto::find($id);

        return View::make('admin.producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        $opcionTipoProducto = TipoProducto::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $tipoProducto       = array('' => 'Seleccione el Tipo del Producto') + $opcionTipoProducto;

        return View::make('admin.producto.edit', compact('producto', 'tipoProducto'));
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
            'nombre'         => 'required',
            'idTipoProducto' => 'required|exists:tipo_productos,id',
            'precio'         => 'numeric',
            'cantidad'       => 'numeric',
            'imagen'         => 'image|mimes:png,gif,jpeg,jpg|max:1000',
        );

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {
            $nombre = ucwords($datos['nombre']);

            $producto = Producto::find($id);

            $producto->idTipoProducto = $datos['idTipoProducto'];
            $producto->nombre         = $nombre;
            $producto->precio         = $datos['precio'];
            $producto->cantidad       = $datos['cantidad'];

            if (Input::hasFile('imagen')) {
                $archivoImagen = Input::file('imagen');

                // Datos del anterior archivo de imagen
                $nombreImagenAnterior = $producto->imagen;
                $rutaImagenAnterior   = public_path('assets/imagen/producto/' . $nombreImagenAnterior);

                // Datos del nuevo archivo de imagen
                $extensionImagen      = strtolower($archivoImagen->getClientOriginalExtension());
                $nombreProductoImagen = preg_replace('([^A-Za-z0-9])', '', $nombre);
                $nombreImagen         = $nombreProductoImagen . '.' . $extensionImagen;
                $rutaImagen           = public_path('assets/imagen/producto/' . $nombreImagen);

                // Creamos el objeto Image
                $imagen = Image::make($archivoImagen);

                // Lo redimensionamos
                $imagen->resize(180, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                // Verificamos si existe el directorio 'assets/imagen/vino/'
                if (!File::isDirectory(public_path('assets/imagen/producto/'))) {
                    // Si no existe lo creamos con los correspondientes permisos
                    File::makeDirectory(public_path('assets/imagen/producto/'), 0775, true);
                }

                // Verificamos si existe el archivo
                if (File::exists($rutaImagenAnterior)) {
                    // Eliminamos el anterior archivo
                    File::delete($rutaImagenAnterior);
                }

                // Lo subimos al directorio
                $imagen->save($rutaImagen);

                $producto->imagen = $nombreImagen;
            }

            $producto->save();

            return Redirect::to('admin/producto-servicio')->with('exito', 'El producto fue actualizado');
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
