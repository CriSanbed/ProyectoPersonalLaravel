@extends('layouts.app')

@section('content')
    {{--    {{$perfil->perfilUser}}--}}
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="/storage/{{$perfil->imagen}}" class="w-50 rounded-circle" alt="imagen">


            </div>
            <div class="col-md-7 mt-5 mt-md-0">
                <h2 class="text-center mb-2 text-primary">{{$perfil->perfilUser->name}}</h2>

                <div class="biografia">
                    {!! $perfil->biografia !!}
                </div>
            </div>
        </div>
    </div>
    <h2 class="text-center my-5">Productos creados por: {{$perfil->perfilUser->name}}</h2>
    <div class="container">
        <div class="row mx-auto bg-white p-4">
            {{--            VERIFICAR SI EL USUARIO NO TIENE RECETAS--}}
            @if(count($userProductos)>0)
                @foreach($userProductos as $userProducto)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="/storage/{{$userProducto->imagen}}" class="card-img-top" alt="imagen receta">
                            <div class="card-body">

                                <h3>{{$userProducto->nombre}}</h3>
                                <a href="{{route('productos.show', ['producto' => $userProducto->id])}}"
                                   class="btn btn-primary d-block mt-4 text-uppercase font-weight-bold">Ver producto</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center w-100">No existen productos todavía</p>
            @endif

        </div>
        {{--            ARREGLANDO EL PAGINADOR--}}
{{--        <div class="d-flex justify-content-center">--}}
{{--            {{$userProducto}}--}}
{{--        </div>--}}
    </div>

@endsection
