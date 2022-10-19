@extends('adminlte::page')

@section('title', 'EduVirtual')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
    @livewire('admin.role-component')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop