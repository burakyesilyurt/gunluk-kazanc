<!doctype html>
<html data-theme="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }} ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    {{-- @vite('resources/css/app.css') --}}
    @vite('resources/js/app.js')
</head>

<body class="pt-16 flex flex-col min-h-screen">
    <div id="app">
        <nav class="navbar bg-neutral text-neutral-content fixed z-10 top-0">
            <div class="flex-1">
                <a class="btn btn-ghost normal-case text-sm md:text-base lg:text-xl" href="{{ url('/ilanlar') }}">
                    {{ 'Günlük Kazanç' }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="flex-none md:ml-5">
                <ul class="menu menu-horizontal px-1">
                    @guest
                        @if (Route::has('login'))
                            <li>
                                <a class="text-sm md:text-base lg:text-lg"
                                    href="{{ route('login') }}">{{ __('Giriş Yap') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-sm md:text-base lg:text-lg"
                                    href="{{ route('register') }}">{{ __('Kayıt Ol') }}</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-sm md:text-base lg:text-lg"
                                href="/home" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-sm md:text-base lg:text-lg" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Çıkış Yap') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="my-14">
            @yield('content')
        </main>
    </div>

    <footer class="footer footer-center p-4 bg-base-300 text-base-content fixed -bottom-2">
        <div>
            <p>Copyright © 2023 - All right reserved by Gunluk Kazanc</p>
        </div>
    </footer>
    @stack('scripts')
</body>

</html>
