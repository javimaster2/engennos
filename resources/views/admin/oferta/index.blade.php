@extends('adminlte::page')

@section('title', 'EduVirtual')

@section('content_header')
    <h1>Oferta de cursos</h1>
@stop

@section('content')
        
        @livewire('admin.oferta.oferta-component')

       
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop