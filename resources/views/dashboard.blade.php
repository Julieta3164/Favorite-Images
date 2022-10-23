<x-head/>
<x-header/>
@include('layouts.navigation')

<div class="max">
    @foreach($images ?? []  as $image)
        <div class="card">
            <div class="Img-card">
                <img src="{{$image->url}}" class="img-D" alt="...">
            </div>
            <div class="card-data">
                <div class="titleCard">
                    <h5 class="txtcard">{{$image->title}}</h5>
                </div>
                <div class="keypad">
                    <a href="#" class="H-btn"><i class="bi bi-heart-fill"></i></a>
                    <form action="{{ route('imagen.destroy',['id'=>$image->id]) }}" method="POST">
                        <button type="submit">
                            <a href="#" class="T-btn"><i class="bi bi-trash3"></i></a>
                        </button>
                        @csrf
                        @method('DELETE')
                    </form>
                    <a href="{{ route('imagen.edit',['id'=>$image->id]) }}" class="P-btn"><i class="bi bi-pencil"></i></a>
                </div>
            </div>
        </div>
    @endforeach
</div>


