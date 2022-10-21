<x-head/>
<x-header/>
<div class="title-principal">
    <h1 class="txt-principal">
        Iniciar Seción
    </h1>
</div>

<div class="contem-login">
        <form class="login-F" method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div class="Login">
                <x-label class="label-login" for="email" :value="__('Correo Electronico:')" />
                <x-input class="input-login" id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <!-- Password -->
            <div class="Login">
                <x-label class="label-login" for="password" :value="__('Clave:')" />
                <x-input class="input-login" id="password"  type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="Login">
                <label for="remember_me" class="label-login">
                <input id="remember_me" type="checkbox" class="input-login1" name="remember">
                <span class="">{{ __('Recordar Clave') }}</span>
                </label>
            </div>

            <div class="Login">
                @if (Route::has('password.request'))
                    <a class="A-btn" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>
            
            <div class="Login">
                <x-button class="btn-login">
                    {{ __('Aceptar') }}
                </x-button>
                <x-button class="btn-login">
                    <a class="A-btn" href="{{ url('/welcome') }}">Cancelar</a>
                </x-button>
            </div>
            
        </form>
</div>