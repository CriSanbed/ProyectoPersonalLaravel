@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"
          integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection

@section('botones')
    @include('ui.listarproductos')
@endsection

@section('content')
    <h1 class="text-center">EDITAR PERFIL</h1>
    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3">
            <form method="post" action="{{route('perfiles.update', ['perfil'=>$perfil->id])}}" enctype="multipart/form-data">
                @csrf
{{--                PARA Q SOPORTE EL PUT--}}
                @method('put')
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                           placeholder="Nombre" id="nombre" value="{{$perfil->perfilUser->name}}">
                    @error('nombre')
                    <span class='invalid-feedback d-block' role='alert'>
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>



                <div class="form-group mt-3">
                    <label for="biografia">Biografia</label>
                    <input id="biografia" type="hidden" name="biografia" value="{{$perfil->biografia}}">
                    <trix-editor class="form-control @error('biografia') is-invalid @enderror"
                                 input="biografia"></trix-editor>
                    @error('biografia')
                    <span class='invalid-feedback d-block' role='alert'>
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="imagen">Imagen</label>
                    <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror"
                           name="imagen">
                    {{--                    DIRECTIVA--}}
                    @if($perfil->imagen != null)
                        <div class="mt-4">
                            <p>Imagen actual</p>
                            <img src="/storage/{{$perfil->imagen}}" style="width: 300px">
                        </div>
                    @endif


                    @error('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="EDITAR PERFIL">
                </div>
            </form>

        </div>

    </div>
{{--    {{$perfil->perfilUser}}--}}
@endsection

{{-- SCRIPTS --}}
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"
            integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection
