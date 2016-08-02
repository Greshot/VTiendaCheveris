<div class="row">
    <fieldset style="border:1px solid;padding: 20px 30px; ">
        <legend style=" width:auto;padding:0 10px;border-bottom:none;">Gestión de peliculas</legend>
        <div class="col-md-6">
            <div class="form-group">
                {!!Form::label('fecha','fecha:')!!}
                {!!Form::date('fecha',\Carbon\Carbon::now(),['class'=>'form-control',
                'placeholder'=>'Ingresa la fecha del prestamo','required'=>'required'])!!}
            </div>
        </div>
        <div class="col-md-6">
            {!!Form::label('cliente','Cliente;')!!}
            {!!Form::select('client_id',$clientdropdown,null,
              ['class'=>'form-control','placeholder' => 'Seleccione el cliente para la cotización',
              'style'=>'width: 100%','required'=>'required']) !!}
        </div>
    </fieldset>
</div>
<div class="row">
    <fieldset style="border:1px solid;padding: 20px 30px; ">
        <legend style=" width:auto;padding:0 10px;border-bottom:none;">Gestión de peliculas</legend>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('buscar','Buscar Pelicula:') !!}
                    <button
                            type="button" value="" data-toggle="modal" data-target="#PeliculasModal"
                            class="btn btn-info" style="display: block">
                        Buscar
                    </button>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        {!! Form::hidden('pelicula_id',null) !!}
                        {!! Form::hidden('maxCantidad',null) !!}
                        {!! Form::label('pelicula','Pelicula:') !!}
                        {!!Form::text('titulo',null,['class'=>'form-control','maxlength'=>'255','readonly'=>'readonly'])!!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('descripcion','Descripcion:') !!}
                        {!!Form::text('descripcion',null,['class'=>'form-control','maxlength'=>'255','readonly'=>'readonly'])!!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('fecha','Fecha:') !!}
                        {!!Form::text('fecha',null,['class'=>'form-control','maxlength'=>'255','readonly'=>'readonly'])!!}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::label('cantidad','Cantidad:',['id'=>'labelCantidad']) !!}
                        {!!Form::number('cantidad',null,['class'=>'form-control','min'=>'0'])!!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::label('agregar','Agregar:') !!}
                        <button
                                type="button" value="" id="adicionarPelicula"
                                class="btn btn-success" style="display: block">
                            Adicionar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
            <br>
            <h3>Películas en el Prestamo</h3>
        </div>
        <div class="form-group">
            <div class="table-responsive">
                <table class="table table-hover table-condensed" id="prestamoPeliculasTable">
                    <thead>
                    <th style="display: none">Id</th>
                    <th class="text-center">Titulo</th>
                    <th class="text-center">Cantidad Seleccionada</th>
                    <th class="text-center">Acciones</th>
                    </thead>
                    <tbody id="peliculasPrestamo">

                    </tbody>
                </table>
            </div>
        </div>
    </fieldset>
</div>