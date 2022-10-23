<nav x-data="{ open: false }" class="nav">

    <div class="nav-name">
        <i class="bi bi-person-fill"></i>
        <strong class="txt-name">{{ Auth::user()->name }} </strong> 
    </div>
    
    <button class="btn-Fav">
        <a class="" href="">Favoritas<i class="bi bi-heart-fill"></i></i></a>
    </button>

    <button class="btn-new">
        <a class="" href="">Agregar Nueva<i class="bi bi-plus-lg"></i></a>
    </button>

    <form class="btn-CS" method="POST" action="{{ route('logout') }}">
        @csrf
        <x-responsive-nav-link : class="btn-CS1" href="route('logout')"
            onclick="event.preventDefault();
                this.closest('form').submit();">
            {{ __('Cerrar Seción') }}<i class="bi bi-x"></i>
        </x-responsive-nav-link>
    </form> 

    
</nav>