@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Edición de Películas</h3>
        </div>
    </div>
    @include('errors.request')
    {!!Form::model($movie,['route'=> ['movie.update',$movie->id],'method'=>'PATCH'])!!}
    @include('Movie.form')
    <div class="col-sm-3 col-sm-offset-5">
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
    </div>
    {!!Form::close()!!}
@stop