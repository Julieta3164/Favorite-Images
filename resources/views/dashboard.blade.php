<x-head/>
<x-header/>
@include('layouts.navigation')


{{-- @foreach --}}
    <div class="card">
        <div class="Img-card">
            <img src="{{ asset('img/cabecera.png') }}" class="img-D" alt="...">
        </div>
        <div class="card-data">
            <div class="titleCard">
                <h5 class="txtcard">Card title</h5>
            </div>
            <div class="keypad">
                <a href="#" class="H-btn"><i class="bi bi-heart-fill"></i></a>
                <a href="#" class="T-btn"><i class="bi bi-trash3"></i></a>
                <a href="#" class="P-btn"><i class="bi bi-pencil"></i></a>
            </div>
        </div>
    </div>
{{-- @endforeach --}}



