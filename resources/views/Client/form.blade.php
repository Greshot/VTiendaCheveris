<div class="form-group">
    {!!Form::label('identificacion','Identificación:')!!}
    {!!Form::text('identificacion',null,['class'=>'form-control',
    'placeholder'=>'Ingresa la identificación del cliente','required'=>'required'])!!}
</div>
<div class="form-group">
    {!!Form::label('nombre','Nombre:')!!}
    {!!Form::text('nombre',null,['class'=>'form-control',
    'placeholder'=>'Ingresa el nombre del cliente','required'=>'required'])!!}
</div>
<div class="form-group">
    {!!Form::label('direccion','Dirección:')!!}
    {!!Form::text('direccion',null,['class'=>'form-control',
    'placeholder'=>'Ingresa la dirección del cliente','required'=>'required'])!!}
</div>
<div class="form-group">
    {!!Form::label('telefono','Teléfono:')!!}
    {!!Form::text('telefono',null,['class'=>'form-control',
    'placeholder'=>'Ingresa el teléfono del cliente','required'=>'required'])!!}
</div>
<div class="form-group">
    {!!Form::label('email','Email:')!!}
    {!!Form::email('email',null,['class'=>'form-control',
    'placeholder'=>'Ingresa el email del cliente','required'=>'required'])!!}
</div>