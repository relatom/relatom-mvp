<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Relatom') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <div>
            <h1>Paramètre</h1>
        </div>
        <div>
            <ul>
                <li><a href="/">Fermer</a></li> <!-- retour au dernier lien effectuer -->
            </ul>  
        </div>        
    </header>

    @if (session('status'))
        <div role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div id="app">

        <aside>
            
            @component('components.setting-navigation')
            @endcomponent

        </aside>

        <section>

            @yield('content')

        </section>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
