<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Relatom') }}</title>

    <!-- Styles -->
    <!-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <header>
        <div>
            <a href="{{ url('/') }}">{{ config('app.name', 'Relatom') }}</a>
        </div>
        <div>
            <ul>
                @guest
                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @if (Route::has('register'))
                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @endif
                
                @else
                <li><a href="{{ route('settings') }}">Paramètres</a></li>
                <li><a href="">Notifications</a></li>
                <li><a 
                    href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
                @endguest
                
            </ul>
                  
        </div>        
    </header>

    @if (session('status'))
        <div role="alert">
            {{ session('status') }}
        </div>
    @endif

    <main>

        <aside>
            
            @component('components.principale-navigation')
            @endcomponent

            

        </aside>

        @yield('content')
        
    </main>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
