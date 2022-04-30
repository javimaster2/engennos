@extends('adminlte::page')

@section('title', 'EduVirtual')

@section('content_header')
    <h1>{{ $course->title }}</h1>
@stop

@section('content')
        
        
        @livewire('admin.cupon.sub-cupon-component',['course' =>  $course])
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop