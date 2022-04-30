@extends('adminlte::page')

@section('title', 'EduVirtual')

@section('content_header')
    <h1>Cupones de descuentos para cursos</h1>
@stop

@section('content')
        
        @livewire('admin.cupon.cupon-component')
      {{--  <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead> 
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->title}}</td>
                            <td>
                                <a href="{{route('admin.cupon.show',$course)}}" class="btn btn-primary">Revisar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$courses->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div> --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop