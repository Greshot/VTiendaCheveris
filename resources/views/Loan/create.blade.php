@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Ingreso de Prestamos</h3>
        </div>
    </div>
    @include('errors.request')
    @include('Loan.peliculasModal')
    {!!Form::open(['route'=>'loan.store', 'method'=>'POST','id'=>'saveLoan'])!!}
    @include('Loan.form')
    <br>
    <div class="col-sm-3 col-sm-offset-5">
        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
    </div>
    {!!Form::close()!!}
@stop
@section('scripts')
    {!!Html::script('js/Loan/script.js')!!}
@endsection