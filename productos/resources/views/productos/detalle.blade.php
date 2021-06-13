@extends('layouts.app')

@section('botones')
<a class="btn btn-primary" href="{{route('productos.index')}}">Agregar Producto</a>
@endsection

@section('content')
<div class="card text-center">
    <div class="card-header">
        Detalle
    </div>
    <div class="card-body">
        <h5 class="card-title">Categoria: Cuidado Personal</h5>
        <p class="card-text">Un protector solar con la fórmula perfecta, dermatológicamente probada, para estar siempre protegido de los rayos del sol.

        ¿Ya sabes cómo protegerte todo el año?</p>
        <a href="{{route('productos.index')}}" class="btn btn-primary">Regresar al inicio</a>
    </div>
    <div class="card-footer text-muted">
        creado hace 5 dias
    </div>
</div>
@endsection
