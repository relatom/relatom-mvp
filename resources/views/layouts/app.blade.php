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
    <header class="bg-gray-500 w-screen fixed">
        <div class="container mx-auto flex justify-between items-center p-6 pb-4 pt-4 ">
            <div>
                <a href="{{ url('/') }}">{{ config('app.name', 'Relatom') }}</a>
            </div>
            <div>
                <form>
                    <input class="search_input" type="text" name="" placeholder="Search...">
                </form>
            </div>
            <div>
                <ul class="flex">
                    @guest
                        <li class="mr-6">
                            <a href="{{ route('login') }}" 
                            class="text-blue-500 hover:text-blue-800">{{ __('Login') }}</a>
                        </li>
                    @if (Route::has('register'))
                        <li class="mr-6">
                            <a href="{{ route('register') }}"
                            class="text-blue-500 hover:text-blue-800">{{ __('Register') }}</a>
                        </li>
                    @endif
                    
                    @else
                        <li class="mr-6">
                            <a href="{{ route('settings') }}"
                            class="text-blue-500 hover:text-blue-800">Paramètres</a>
                        </li>
                        <li class="mr-6">
                            <a href=""
                            class="text-blue-500 hover:text-blue-800">Notifications</a>
                        </li>
                        <li class="mr-6">
                            <a 
                            href="{{ route('logout') }}" 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="text-blue-500 hover:text-blue-800">
                            {{ __('Logout') }}</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </ul>
            </div>  
        </div>
    </header>

    @if (session('status'))
        <div role="alert">
            {{ session('status') }}
        </div>
    @endif

    <main class="container mx-auto flex">

        <aside class="fixed h-full hidden lg:-mb-0 lg:block lg:border-0 lg:border-b-0 lg:h-auto lg:overflow-y-visible  lg:static lg:w-1/4 lg:pt-16 w-full xl:w-1/5 z-90">
            
            @component('components.principale-navigation')
            @endcomponent

        </aside>

        <div class="lg:w-3/4 xl:w-4/5 p-4 pt-24">
            @yield('content')
        </div> 

    </main>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
