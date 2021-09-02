@extends('adminlte::page')

@section('title', 'EduVirtual')

@section('content_header')
    <h1>Lista de Categorias</h1>
@stop

@section('content')
        
        @livewire('admin.category.category-component')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    

@stop