@extends('layout')
@section('content')
    <div class="jumbotron text-center">
        @if(isset($bestClientByLoans))
            <h1>Nuestro Cliente más leal es : {{$bestClientByLoans->nombre }}!</h1>
            <h3>Hata el momento {{$bestClientByLoans->nombre }} ha realizado {{$bestClientByLoans->loans()->count()}}
                prestamos en nuestra tienda</h3>
            <hr>
            <p>
                Puede ver el detalle de todos los prestamos en el siguiente
                <a class="btn btn-primary" href="/loan" role="button">Link</a>
            </p>
        @else
        <p>Aún no tenemos prestamos registrados para determinar cual es nuestro cliente más leal</p>
        @endif
    </div>
@endsection