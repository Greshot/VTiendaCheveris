@extends('layout')
@section('content')
    @include('Movie.show')
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Listado de Películas</h3>
        </div>
    </div>
    <div class="row" id="top">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row text-center">
                    <div class="col-xs-12">
                        <a href="{!!URL::to('movie/create')!!}" class="btn btn-success"> Nueva Pelicula</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            {{Session::get('message')}}
        </div>
    @endif
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="movies">
                    @if(count($movies)==0)
                        <div class="text-center">
                            <h3>No hay Peliculas para mostrar</h3>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed">
                                <thead>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                                </thead>
                                <tbody>
                                @foreach($movies as $movie)
                                    <tr>
                                        <td>{{$movie->titulo}}</td>
                                        <td>{{$movie->descripcion}}</td>
                                        <td>{{$movie->fecha}}</td>
                                        <td>{{$movie->cantidad}}</td>
                                        <td>
                                            <div class="col-sm-1" style="margin-right:10%">
                                                <button type="button" value="{{$movie->id}}"
                                                        onclick="MostrarPelicula(this)"
                                                        class="btn btn-success " data-toggle="modal"
                                                        data-target="#show">Ver
                                                </button>
                                            </div>
                                            <div class="col-sm-1">
                                                {!!link_to_route('movie.edit', $title = 'Editar', $parameters = $movie->id,
                                                $attributes = ['class'=>'btn btn-primary'])!!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

            </div>

        </div>
    </div>
@endsection
@section('scripts')
    {!!Html::script('js/Movie/script.js')!!}
@endsection