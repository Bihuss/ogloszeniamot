<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('js/lightbox/css/lightbox.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand w-25" href="{{ url('/') }}">
                    <img src="{{ asset('img/bA4pQBqCkH5ibhWuExONVEFvRqjKATDHeHYmyAYx.jpg') }}" alt="" class="w-100">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a id="dropdownMenu1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" 
                            aria-expanded="false" class="nav-link dropdown-toggle">Kategorie</a>

                            <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="{{ route('items.index') }}" class="dropdown-item">Wszystkie </a></li>

                                <li class="dropdown-divider"></li>

                                @include('item.subCategoryList',['subcategories' => $parentCategories,'depth'=>0])
                            </ul>
                        </li>
                        <li class="nav-item">
                            @if(isset(auth()->user()->id))
                            <a href="{{ route('items.filter',['userid'=>auth()->user()->id]) }}" class="nav-link">Moje Ogłoszenia</a>
                            @endif
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a href="{{ route('item.create') }}" class="nav-link"><i class="fas bi-plus-circle"></i> Dodaj ogłoszenie</a>
                        </li>

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
    {{-- content w pliku show.blade.php zgodnie z konwencja laravel --}}


{{--    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>--}}

    @vite(['resources/js/app.js'])

    <script src="{{ asset('js/lightbox/js/lightbox-plus-jquery.min.js') }}"></script>
</body>
</html>
