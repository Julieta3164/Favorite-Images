<x-head/>
<x-header/>
<div class="title-principal">
    <h1 class="txt-principal">
        Registrate
    </h1>
</div>
<div class="conten-register">
    <form class="register-F" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="register">
            <x-label class="label-R" for="name" :value="__('Nombre:')" />
            <x-input id="name" class="input-R" type="text" name="name" :value="old('name')" required autofocus />
        </div>

        <!-- Email Address -->
        <div class="register">
            <x-label class="label-R" for="email" :value="__('Correo Electronico:')" />
            <x-input id="email" class="input-R" type="email" name="email" :value="old('email')" required />
        </div>

        <!-- Password -->
        <div class="register">
            <x-label class="label-R" for="password" :value="__('Contraseña:')" />
            <x-input id="password" class="input-R" type="password" name="password" required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="register">
            <x-label class="label-R" for="password_confirmation" :value="__('Confirmar Contraseña:')" />
            <x-input id="password_confirmation" class="input-R" type="password" name="password_confirmation" required />
        </div>

        <div class="register">
            <a class="A-btn" href="{{ route('login') }}">
            {{ __('¿Ya estas registrado?') }}
            </a>
        </div>

        <div class="register1">
            <x-button class="btnR">{{ __('Register') }}</x-button>
            <x-button class="btnR"><a href="{{ url('/welcome') }}">Cancelar</a></x-button>
        </div>
    </form>
</div>