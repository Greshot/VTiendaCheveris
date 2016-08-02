@extends('layout')
@section('content')
    @include('Client.show')
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Listado de Clientes</h3>
        </div>
    </div>
    <div class="row" id="top">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row text-center">
                    <div class="col-xs-12">
                        <a href="{!!URL::to('client/create')!!}" class="btn btn-success"> Nuevo Cliente</a>
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
                <div class="Clientes">
                    @if(count($clients)==0)
                        <div class="text-center">
                            <h3>No hay Clientes para mostrar</h3>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed">
                                <thead>
                                <th>Identificación</th>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{$client->identificacion}}</td>
                                        <td>{{$client->nombre}}</td>
                                        <td>{{$client->telefono}}</td>
                                        <td>{{$client->email}}</td>
                                        <td>{{$client->direccion}}</td>
                                        <td>
                                            <div class="col-sm-1" style="margin-right:10%">
                                                <button type="button" value="{{$client->id}}"
                                                        onclick="showClient(this)"
                                                        class="btn btn-success " data-toggle="modal"
                                                        data-target="#show">Ver
                                                </button>
                                            </div>
                                            <div class="col-sm-1">
                                                {!!link_to_route('client.edit', $title = 'Editar', $parameters = $client->id,
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
    {!!Html::script('js/Client/script.js')!!}
@endsection