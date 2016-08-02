<div class="modal fade" id="PeliculasModal" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document" style="width: 100%">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #5cb85c">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="tittle-pre-firma">Peliculas</h3>
            </div>
            <div class="modal-body">
                @if(count($movies)==0)
                    <div class="text-center">
                        <h3>No hay peliculas registradas</h3>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed">
                            <thead style="background-color: #0f0f0f; color: snow">
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Cantidad</th>
                            <th>Seleccionar</th>
                            </thead>
                            <tbody>
                            @foreach($movies as $movie)
                                <tr>
                                    <td>{{$movie->titulo}}</td>
                                    <td>{{$movie->descripcion}}</td>
                                    <td>{{$movie->fecha}}</td>
                                    <td>{{$movie->cantidad}}</td>
                                    <td>
                                        <button
                                                type="button" value="{{$movie->id}}"
                                                onclick="seleccionarPelicula(this)"
                                                class="btn btn-warning" style="display: block">
                                            Seleccionar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            <div class="modal-footer " style="background-color: #5cb85c">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->