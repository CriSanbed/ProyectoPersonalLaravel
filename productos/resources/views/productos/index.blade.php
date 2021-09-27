@extends('layouts.app')

@section('botones')
    @include('ui.navegacion')
@endsection

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
                    <td>{{$userProducto->categoriaProducto->nombre}}</td>
                    <td>{{$userProducto->paraQuien}}</td>
                    <td>
                        <a class="btn btn-primary"
                           href="{{route('productos.show', ['producto'=>$userProducto->id])}}"><i
                                class="fas fa-eye"></i></a>
                        <a class="btn btn-success"
                           href="{{route('productos.edit', ['producto'=>$userProducto->id])}}"><i
                                class="fas fa-edit"></i></a>
                        <eliminar-producto producto-id={{$userProducto->id}}></eliminar-producto>
                    </td>

                </tr>
            @endforeach
        </table>

        {{--        --}}{{--        PAGINACION--}}
        {{--        <div class="col-12 mt-4 justify-content-center d-flex">--}}

        {{--            {{$userProductos->links()}}--}}
        {{--        </div>--}}
        {{--                {{$iLikes}}--}}
        {{--        @if(count($iLikes) > 0)--}}

        {{--            <h2 class="text-center my-5">Productos que te gustan</h2>--}}
        {{--            <div class="col-md-10 mx-auto bg-white p3">--}}
        {{--                <ul class="list-group">--}}
        {{--                    @foreach($iLikes as $productoLike)--}}
        {{--                        <li class="list-group-item d-flex justify-content-between align-items-center">--}}
        {{--                            <p>{{$productoLike->nombre}}</p>--}}
        {{--                            <a class="btn btn-outline-primary text-uppercase font-weight-bold"--}}
        {{--                               href="{{route('productos.show', ['producto'=> $productoLike->id])}}">Ver</a>--}}
        {{--                        </li>--}}
        {{--                    @endforeach--}}
        {{--                </ul>--}}

        {{--            </div>--}}
        {{--        @else--}}
        {{--            <p class="text-center my-5 font-weight-bold">Aún no tienes productos que te gusten</p>--}}
        {{--        @endif--}}
    </div>

@endsection

{{-- SCRIPTS --}}
@section('script') <!--VIENE DEL NOMBRE QUE PUSE EN: app.blade.php-->
<script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"
        integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0"
        crossorigin="anonymous"></script>
@endsection


