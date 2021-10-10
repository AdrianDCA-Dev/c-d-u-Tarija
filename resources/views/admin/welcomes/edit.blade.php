@extends('adminlte::page')

@section('title', 'Blog Tarija')

@section('content_header')
    <h1>Editar Portada</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($welcome,['route' => ['admin.welcomes.update', $welcome], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

            @include('admin.welcomes.partials.form')

            {!! Form::submit('Actualizar portada', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop
