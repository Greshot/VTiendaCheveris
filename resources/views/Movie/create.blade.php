@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Ingreso de Películas</h3>
        </div>
    </div>
    @include('errors.request')
    {!!Form::open(['route'=>'movie.store', 'method'=>'POST'])!!}
    @include('Movie.form')
     <div class="col-sm-3 col-sm-offset-5">
    	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
    </div>
    {!!Form::close()!!}
@stop