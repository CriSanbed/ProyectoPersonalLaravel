@extends('layouts.app')

{{--ESTILOS--}}
@section('styles')
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
@endsection

@section('botones')
    <a class="btn btn-primary" href="{{route('productos.create')}}">Agregar Producto</a>
@endsection

@section('content')
    <h2 class="text-center mb-3">Administra tus Productos</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table table-dark">
            <thead class="bg-primary text-light">
            <tr>
                <th scope="col">NOMBRE</th>
                <th scope="col">CATEGORIA</th>
                <th scope="col">PARA QUIEN</th>
                <th scope="col">ACCIONES</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            {{--        RECORRO LA INFORMACION QUE ESTA ALMACENADA--}}
            @foreach($userProductos as $userProducto)
                <tr>
                    <td>{{$userProducto->nombre}}</td>
                    <td>{{$userProducto->categorias_id}}</td>
                    <td>{{$userProducto->paraQuien}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('productos.detalle')}}"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-success" href="{{route('productos.detalle')}}"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger" href="{{route('productos.detalle')}}"><i class="far fa-trash-alt"></i></a>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
@endsection

{{-- SCRIPTS --}}
@section('script') <!--VIENE DEL NOMBRE QUE PUSE EN: app.blade.php-->
<script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"
        integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0"
        crossorigin="anonymous"></script>
@endsection


