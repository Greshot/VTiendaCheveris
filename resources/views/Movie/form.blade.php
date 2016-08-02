<div class="form-group">
    {!!Form::label('titulo','titulo:')!!}
    {!!Form::text('titulo',null,['class'=>'form-control',
    'placeholder'=>'Ingresa el titulo de la pelicula','required'=>'required'])!!}
</div>
<div class="form-group">
    {!!Form::label('descripcion','Descripción:')!!}
    {!!Form::textarea('descripcion',null,['class'=>'form-control',
    'placeholder'=>'Ingresa la descripción de la pelicula','required'=>'required'])!!}
</div>
<div class="form-group">
    {!!Form::label('fecha','fecha:')!!}
    {!!Form::date('fecha',\Carbon\Carbon::now(),['class'=>'form-control',
    'placeholder'=>'Ingresa la fecha de publicación de la pelicula','required'=>'required'])!!}
</div>
<div class="form-group">
    {!!Form::label('cantidad','Cantidad:')!!}
    {!!Form::number('cantidad',null,['class'=>'form-control',
    'placeholder'=>'Ingresa la cantidad de peliculas','required'=>'required'])!!}
</div>