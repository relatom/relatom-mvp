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

    <!-- Scripts temporary -->
    <script src="https://kit.fontawesome.com/de1e190cd9.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-200">

    @include('partials.header')

    @if (session('status'))
        <div role="alert">
            {{ session('status') }}
        </div>
    @endif

    <main class="container mx-auto flex">

        <aside class="pt-20 lg:pt-24 fixed h-full hidden lg:-mb-0 lg:block lg:border-0 lg:border-b-0 lg:h-auto lg:overflow-y-visible  lg:static lg:w-1/4  w-full xl:w-1/5 z-90">
            
            @component('components.principale-navigation')
            @endcomponent

        </aside>

        <div class="pt-20 lg:pt-24 lg:w-3/4 xl:w-4/5 p-4 ">
            @yield('content')
        </div> 

    </main>

    @include('partials.footer')

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
