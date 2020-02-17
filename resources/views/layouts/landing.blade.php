<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Relatom') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"> 
</head>
<body class="bg-gray-100">
    <header class="bg-gray-500 w-screen">
        <div class="container mx-auto flex justify-between items-center p-4 pb-4 pt-4 ">
            <div>
                <a href="{{ url('/') }}">{{ config('app.name', 'Relatom') }}</a>
            </div>
            <div>
                <ul class="flex">
                   <li class="mr-6">
                        <a href="{{ route('login') }}" 
                            class="text-blue-500 hover:text-blue-800">{{ __('Login') }}</a>
                    </li> 
                </ul>
            </div>  
        </div>
    </header>

    @if (session('status'))
        <div role="alert">
            {{ session('status') }}
        </div>
    @endif

    <main class="container mx-auto">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
