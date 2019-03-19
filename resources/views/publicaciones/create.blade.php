@extends('layouts.app')

@section('content')
    <br>
    <div class="card">
        <div class="card-header title">
            <h4><strong>Añadir nueva publicacion</strong></h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['route'=>['publicaciones.store'], 'method'=>'POST']) !!}
                        <div class="form-group{{ $errors->has('referencia') ? ' has-error' : '' }}">
                            {!! Form::label('referencia', 'Referencia:') !!}
                            {!! Form::text('referencia', null, ['class'=>'form-control input-lg', 'placeholder'=>'Introduce la referencia de la publicacion', 'value'=>old('referencia')]) !!}

                            @if ($errors->has('referencia'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('referencia') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            {!! Form::label('tipo', 'Tipo:') !!}
                            {!! Form::text('tipo', null, ['class'=>'form-control input-lg', 'placeholder'=>'Introduce el tipo de la publicacion', 'value'=>old('tipo')]) !!}
                        
                            @if ($errors->has('tipo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tipo') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            {!! Form::label('year', 'Año de la publicacion:') !!}
                            {!! Form::text('year', null, ['class'=>'form-control input-lg', 'placeholder'=>'Introduce el año de la publicacion', 'value'=>old('year')]) !!}
                            
                            @if ($errors->has('year'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('year') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('profesores', 'Selecciona los profesores involucrados:') !!}
                            @foreach($profesores as $profesor)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  value="{{$profesor->id}}"  name="ids[]">
                                        <label class="form-check-label" for="defaultCheck1" >
                                            {{ $profesor->nombre }}
                                    </label>
                                </div>   
                            @endforeach   
                        </div>
                        <div class="text-right">
                            {!! Form::submit('Guardar', ['class'=>'btn btn-warning btn-block btn-md']) !!}
                            
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
