@extends('adminlte::page')

@section('title', 'Blog Tarija')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.welcomes.create')}}">Nueva Portada</a>
    <h1>Listado de Portada</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    @livewire('admin.welcomes-index')
@stop
