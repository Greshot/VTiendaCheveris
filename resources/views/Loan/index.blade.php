@extends('layout')
@section('content')
    @include('Loan.show')
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Listado de Prestamos</h3>
        </div>
    </div>
    <div class="row" id="top">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row text-center">
                    <div class="col-xs-12">
                        <a href="{!!URL::to('loan/create')!!}" class="btn btn-success"> Nuevo Prestamo</a>
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
                <div class="loans">
                    @if(count($loans)==0)
                        <div class="text-center">
                            <h3>No hay Prestamos para mostrar</h3>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed">
                                <thead>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Peliculas</th>
                                <th>Acciones</th>
                                </thead>
                                <tbody>
                                @foreach($loans as $loan)
                                    <tr>
                                        <td>{{$loan->fecha}}</td>
                                        <td>{{$loan->client->nombre}}</td>
                                        <td>
                                            @foreach($loan->movies as $movie)
                                                {{$movie->titulo}}<br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="col-sm-1">
                                                <button type="button" value="{{$loan->id}}"
                                                        onclick="MostrarPrestamo(this)"
                                                        class="btn btn-success " data-toggle="modal"
                                                        data-target="#show">Ver
                                                </button>
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
    {!!Html::script('js/Loan/script.js')!!}
@endsection