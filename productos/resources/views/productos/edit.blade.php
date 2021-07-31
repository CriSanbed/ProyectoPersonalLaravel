@extends('layouts.app')

{{--ESTILOS--}}
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"
          integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
@endsection

@section('botones')
    <a class="btn btn-success" style="float: right; margin:auto;" href="{{route('productos.index')}}">Volver a
        Productos</a>
@endsection

@section('content')
    <h2 class="text-center mb-3">Editar Producto: {{$producto->nombre}}</h2>
    {{--    {{$categorias}} PARA SABER QUE SI ESTA PASANDO CATEGORIAS AL DAR CLIC EN CREAR--}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            {{--            enctype -> me permite la subida de archivos a la aplicacion--}}
            <form method="POST" action={{route('productos.update', ['producto'=>$producto->id])}} enctype="multipart/form-data" novalidate>
                {{-- TOKEN CREADO --}}
                @csrf
                {{--PARA QUE HTML SOPORTE PUT--}}
                @method('PUT')

                {{-- NOMBRE DEL PRODUCTO --}}
                <div class="form-group">
                    <label for="nombre">Nombre del Producto</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                           id="nombre" value="{{$producto->nombre}}">

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
                    <select name="categorias" class="form-control @error('categorias') is-invalid @enderror"
                            id="categorias">
                        <option value="" disabled selected>--Seleccione--</option>
                        @foreach($categorias as $categoria)
                            <option
                                value={{$categoria -> id}} {{$producto->categorias_id==$categoria->id ? 'selected' : ''}}>{{$categoria->nombre}}</option>
                        @endforeach
                    </select>

                    @error('categorias')
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
                        <option value="Para él">Para él</option>
                        <option value="Para ella">Para ella</option>
                        <option value="Unisex">Unisex</option>

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
                    <input id="descripcion" type="hidden" name="descripcion" value="{{$producto->descripcion}}">
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
                    <label for="imagen">Imagen Producto  <i class="fas fa-images"></i></label><br>
                    <input id="imagen" type="file" class="btn btn-secondary" name="imagen">
                </div>
                <div class="mt-4">
                    <p>Imagen actual</p>
                    <img src="/storage/{{$producto->imagen}}" style="width: 300px">
                </div>
                @error('imagen')
                <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

{{--                BOTON--}}
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="EDITAR PRODUCTO">
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
<script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"
        integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0"
        crossorigin="anonymous"></script>
@endsection


