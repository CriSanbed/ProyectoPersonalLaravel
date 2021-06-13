@extends('layouts.app')

@section('botones')
    <a class="btn btn-primary" href="{{route('productos.create')}}">Agregar Producto</a>
@endsection

@section('content')
<h2 class="text-center mb-3">Administra tus Productos</h2>
<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table table-dark">
        <thead class="bg-primary text-light">
            <tr>
                <th scole="col">NOMBRE</th>
                <th scole="col">CATEGORIA</th>
                <th scole="col">PARA QUIEN</th>
                <th scole="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Protector TOTALBLOCK 100</td>
                <td>Cuidado Personal</td>
                <td>Unisex</td>
                <td><a class="btn btn-primary" href="{{route('productos.detalle')}}">Mas Detalles --></a></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection


