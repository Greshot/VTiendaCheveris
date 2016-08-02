@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Edición de Clientes</h3>
        </div>
    </div>
    @include('errors.request')
    {!!Form::model($client,['route'=> ['client.update',$client->id],'method'=>'PATCH'])!!}
    @include('Client.form')
    <div class="col-sm-3 col-sm-offset-5">
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
    </div>
    {!!Form::close()!!}
@stop