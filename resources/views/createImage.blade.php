<x-head/>
<x-header/>
@include('layouts.navigation')

<div class="title-principal">
    <h1 class="txt-principal">
        Añadir Nueva Imagen
    </h1>
</div>

@if ($errors->any())
    <div role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="Conten">
    <form class="Form" action="{{ route('imagen.save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <div class="ImagenCreate2">
            <img class="img-input" src="{{$image->url}}"  alt="">
        </div> --}}

        <div class="Imagen-Create">
            <input  class="the-input1" type="file" name="file">
        </div>
        
        <div class="Imagen-Create">
            <x-label class="the-label" for="the-title" :value="__('Titulo de la imagen: ')" />
            <x-input class="the-input" type="text" name="title" required /> 
        </div>

        

        <div class="Imagen-Create">
                <button class="btn-save" >
                    {{ __('Guardar') }}
                </button>

            <button class="btn-cancel">
                <a href="{{ url('') }}">Cancelar</a>
            </button>
        </div>
    </form>
</div>