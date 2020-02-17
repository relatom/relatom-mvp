@extends('layouts.landing')

@section('content')

<div class="m-4 mt-24 max-w-xl">
   <section class="cards p-4 flex flex-col justify-center">
    <header>
        <h1>Se connecter à CKC Feins</h1>
        <p>ckcfeins.relatom.io</p>
    </header>
    

    <div>
        <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">
                {{ __('E-Mail Address') }}:
            </label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <p>
                {{ $message }}
            </p>
            @enderror
        </div>
        <div>
            <label for="password">
                {{ __('Password') }}:
            </label>
            <input id="password" type="password" name="password" required>
            @error('password')
            <p>
                {{ $message }}
            </p>
            @enderror
        </div>

        <div>
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
        <div>
            <button type="submit">
                {{ __('Login') }}
            </button>
        </div>
    </form>
    <p>@if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif</p>
    </div>
    
</section>

<p><b>Vous n'avez pas encore de compte sur cet espace de travail ?</b><br>
Demandez à l'adiministrateur de l'espace de travail de vous inviter</p>
 
</div>



@endsection
