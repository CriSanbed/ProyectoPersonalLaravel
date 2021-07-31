@extends('layouts.app')

{{--ESTILOS--}}
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"
          integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection

@section('botones')
    <a class="btn btn-success" style="float: right; margin:auto;" href="{{route('productos.index')}}">Volver a
        Productos</a>
@endsection

@section('content')
    <h2 class="text-center mb-3">Agregar nuevos Productos</h2>
    {{--    {{$categorias}} PARA SABER QUE SI ESTA PASANDO CATEGORIAS AL DAR CLIC EN CREAR--}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
{{--            enctype -> me permite la subida de archivos a la aplicacion--}}
            <form method="POST" action={{route('productos.store')}} enctype="multipart/form-data" novalidate>
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
                    <label for="nombre">Categoría del Producto</label>
                    <select name="categoria" class="form-control @error('categoria') is-invalid @enderror"
                            id="categoria">
                        <option value="" disabled selected>--Seleccione--</option>
                        {{--@foreach($categorias as $categoria)
                            <option
                                value={{$categoria -> id}} {{old('categorias')==$categoria->id ? 'selected' : ''}}>{{$categoria->nombre}}</option>
                        @endforeach--}}
                        @foreach($categorias as $id => $categoria)
                            <option value={{$id}} {{old('categoria')==$id ? 'selected' : ''}}>{{$categoria}}</option>
                        @endforeach
                    </select>

                    @error('categoria')
                    <span class='invalid-feedback d-block' role='alert'>
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                {{-- PARA QUIEN --}}
                <div class="form-group">
                    <label for="paraQuien">Para el o para ella?</label>

                    <select name="paraQuien" class="form-control @error('paraQuien') is-invalid @enderror"
                            id="paraQuien">
                        <option value="" disabled selected>--Seleccione--</option>
                        <option value="paraEl">Para él</option>
                        <option value="paraElla">Para ella</option>
                        <option value="unisex">Unisex</option>

                    </select>

                    @error('paraQuien')
                    <span class='invalid-feedback d-block' role='alert'>
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                {{-- DESCRIPCION --}}
                <div class="form-group mt-3">
                    <label for="descripcion">Descripción</label>
                    <input id="descripcion" type="hidden" name="descripcion" value="{{old('descripcion')}}">
                    <trix-editor class="form-control @error('descripcion') is-invalid @enderror"
                                 input="descripcion"></trix-editor>

                    @error('descripcion')
                    <span class='invalid-feedback d-block' role='alert'>
                    <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                {{-- IMAGEN --}}
                <div class="form-group mt-3">
                    <label for="imagen">Imagen Producto</label><br>
                    <input id="imagen" type="file" class="btn btn-secondary" name="imagen">
                </div>

                @error('imagen')
                <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="AGREGAR">
                </div>
            </form>
        </div>
    </div>
@endsection

{{-- SCRIPTS --}}
@section('script') <!--VIENE DEL NOMBRE QUE PUSE EN: app.blade.php-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"
        integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection

