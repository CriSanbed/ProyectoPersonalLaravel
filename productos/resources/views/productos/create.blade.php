@extends('layouts.app')

@section('botones')
    <a class="btn btn-success" style="float: right; margin:auto;" href="{{route('productos.index')}}">Volver a
        Productos</a>
@endsection

@section('content')
    <h2 class="text-center mb-3">Agregar nuevos Productos</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action={{route('productos.store')}}>
                {{-- TOKEN CREADO --}}
                @csrf

                {{-- ID PRODUCTO --}}
                {{-- <div class="form-group">
                        <label for="id">ID del Producto</label>
                        <input type="number" name="id" class="form-control @error('id') is-invalid @enderror" id="id" placeholder="Ingresa el ID del producto" value="{{old('id')}}">
                @error('id')
                {{-- <p>Hubo un error de longitud de  caracteres</p> EJEMPLO--}}
                {{-- <span class='invalid-feedback d-block' role='alert'>
                                <strong>{{$message}}</strong>
                </span>
                @enderror
        </div> --}}

                {{-- NOMBRE DEL PRODUCTO --}}
                <div class="form-group">
                    <label for="nombre">Nombre del Producto</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                           id="nombre" placeholder="Ingresa el nombre del producto" value="{{old('nombre')}}">
                    @error('nombre')
                    {{-- <p>Hubo un error de longitud de  caracteres</p> EJEMPLO--}}
                    <span class='invalid-feedback d-block' role='alert'>
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                {{-- CATEGORIA PRODUCTO --}}
                <div class="form-group">
                    <label for="categoria">Categoría del Producto</label>

                    {{-- {!! Form::select('categoria', 'uno') !!} --}}

                    {{-- <select class="form-control">

                        <option value="Seleccione">Seleccione</option>
                        <option value="Maquillaje">Maquillaje</option>
                        <option value="Perfumes">Perfumes</option>
                        <option value="Joyería">Joyería</option>
                        <option value="Cuidado Personal">Cuidado Personal</option>
                        <option value="Tratamiento Facial">Tratamiento Facial</option>

                    </select>  --}}
                    <input type="select" name="categoria" class="form-control @error('categoria') is-invalid @enderror"
                           id="categoria" placeholder="Ingresa la categoría del producto" value="{{old('categoria')}}">
                    @error('categoria')
                    <span class='invalid-feedback d-block' role='alert'>
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                {{-- PARA QUIEN --}}
                <div class="form-group">
                    <label for="paraQuien">Para el o para ella?</label>
                    <input type="text" name="paraQuien" class="form-control @error('paraQuien') is-invalid @enderror"
                           id="paraQuien" placeholder="Para el, para ella o unisex?.." value="{{old('paraQuien')}}">
                    @error('paraQuien')
                    <span class='invalid-feedback d-block' role='alert'>
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="AGREGAR">
                </div>
            </form>
        </div>
    </div>

@endsection
