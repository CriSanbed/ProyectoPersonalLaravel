@extends('layouts.app')

@section('botones')
    <a class="btn btn-dark" href="{{route('productos.index')}}">Regresar</a>
@endsection

@section('content')
    {{--    {{$producto}}--}}
    <div class="card text-center">
        <div class="card-header" style="background-color:#a9f6b7; font-size: 20px; color: #0460ad">
            <strong>{{$producto->nombre}}</strong>
        </div>
        <div class="card-body" style="background-color:#d0cece">
            <h5 class="card-title">Categoria: {{$producto->categoriaProducto->nombre}}</h5>
            <p class="card-text">{!!$producto->descripcion!!}</p>
            <img src="/storage/{{$producto->imagen}}" class="w-100" alt="imagenProducto"><p></p>
            <a href="{{route('productos.index')}}" class="btn btn-primary">Regresar al inicio</a>
        </div>
        <div class="card-footer text-muted" style="background-color:#FFDAB9">
            Creado por: <strong>{{$producto->autorProducto->name}}</strong>, el: {{date('d-m-Y', strtotime($producto->created_at))}}
        </div>
    </div>
@endsection
