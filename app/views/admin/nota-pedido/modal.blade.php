<!-- Modal -->
<div class="modal fade" id="productoModal" tabindex="-1" role="dialog" aria-labelledby="detalleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="detalleModalLabel">Productos: </h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Tipo de Producto</th>
                        <th>Imagen</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($productos as $producto)

                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->tipoProducto->nombre }}</td>
                            <td>
                                @if ($producto->imagen)
                                    <img src="{{ asset('assets/imagen/producto/' . $producto->imagen) }}"
                                         height="25%" alt="{{ $producto->nombre }}">
                                @else
                                    <img src="{{ asset('assets/admin/img/ImagenVino.jpg') }}" height="25%"
                                         alt="Imagen del Producto">
                                @endif
                            </td>
                            <th>
                                <button type="button" class="btn btn-success btn-xs btn-block seleccionar-producto"
                                        title="Seleccionar" data-id="{{ $producto->id }}"
                                        data-codigo="{{ $producto->id }}">
                                    <i class="glyphicon glyphicon-check"></i>
                                    <span class="hidden-xs">Seleccionar</span>
                                </button>
                            </th>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

                {{ $productos->links() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
