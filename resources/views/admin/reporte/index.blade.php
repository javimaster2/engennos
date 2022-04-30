@extends('adminlte::page')

@section('title', 'EduVirtual')

@section('content_header')
    <h1>Reporte de pagos</h1>
@stop

@section('content')
        
        @livewire('admin.reporte.reporte-component')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
     

    <script>
        @if(Session::has('message'))
            var type="{{Session::get('alert-type','info')}}"

        
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message')}}");
                    break;
            }
        @endif

    </script>
@stop