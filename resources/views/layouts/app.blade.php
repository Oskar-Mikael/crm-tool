<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"
        integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body>
    @auth
        @include('layouts.sidebar')
        <div id="app" style="margin-left: 200px;min-height:100vh">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
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
                                <li class="nav-item dropdown my-auto mx-2">
                                    <a class="nav-link dropdown-toggle" id="alertsDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        <i class="fa-solid fa-bell fa-lg">
                                            @if (auth()->user()->unreadNotifications->isNotEmpty())
                                                <span style="top:5%"
                                                    class="position-absolute translate-middle p-1 bg-danger border border-light rounded-circle">
                                                </span>
                                            @endif
                                        </i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown">
                                        @forelse (auth()->user()->unreadNotifications->take(10)
            as $notification)
                                            <a class="dropdown-item"
                                                href="/{{ $notification->data['notification_type'] }}/{{ $notification->data['id'] }}">
                                                @if (is_null($notification->read_at))
                                                    <span style="top:5%"
                                                        class="px-1 bg-primary border border-light rounded-circle">
                                                    </span>
                                                @endif
                                                {{ $notification->data['message'] }}
                                                {{ $notification->created_at }}
                                            </a>
                                            @empty
                                            <p class="text-center my-auto">
                                                No new notifications
                                            </p>
                                        @endforelse
                                        @if (auth()->user()->unreadNotifications->count() > 10)
                                            <div class="text-center">
                                                <a href="/profile">
                                                    View all notifications
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/profile">
                                            Profile
                                        </a>
                                        <a class="dropdown-item">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                {{ __('Logout') }}
                                            </form>
                                        </a>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            @if (session()->has('success'))
                <div class="bg-success py-2">
                    <div class="container text-white">
                        {{ session()->get('success') }}
                    </div>
                </div>
            @endif
        @endauth

        <main class="py-4 container">
            @yield('content')
        </main>
        <footer class="position-absolute bg-secondary w-100" style="bottom: 0;min-height:100px">
            <div class="container text-white mt-4">
                This is the footer
            </div>
        </footer>
    </div>
</body>

</html>
