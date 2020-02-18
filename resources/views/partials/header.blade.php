    <header class="bg-blue-700 w-screen fixed">
        <div class="container mx-auto flex justify-between items-center p-4 py-3">
            <div class="text-white font-semibold">
                <a href="{{ url('/') }}">{{ config('app.name', 'Relatom') }}</a>
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