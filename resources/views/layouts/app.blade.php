<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div id="wrapper">

        <!-- sidebar -->
        <div class="sidebar">
            <span class="closeButton">&times;</span>
            <p class="brand-title"><a href="{{route('welcome.index')}}">Blog Station</a></p>

            <div class="side-links">
                <ul>
                    <li><a class="{{ Request::routeIs('welcome.index') ? 'active' : '' }}"
                            href="{{ route('welcome.index') }}">Home</a></li>
                    <li><a class="{{ Request::routeIs('blog.index') ? 'active' : '' }}"
                            href="{{ route('blog.index') }}">Blog</a></li>

                    <li><a
                            class="{{ Request::routeIs('contact.index') ? 'active' : '' }}"href="{{ route('contact.index') }}">Contact</a>
                    </li>

                    @guest

                        <li><a
                                class="{{ Request::routeIs('login') ? 'active' : '' }}"href="{{ route('login') }}">Login</a>
                        </li>
                        <li><a
                                class="{{ Request::routeIs('register') ? 'active' : '' }}"href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest
                    @auth

                        <li><a
                                class="{{ Request::routeIs('home') ? 'active' : '' }}"href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li><a class="{{ Request::routeIs('blog.create') ? 'active' : '' }}"
                            href="{{ route('blog.create') }}">Create Post</a></li>
                    @endauth
                </ul>
            </div>

            <!-- sidebar footer -->
            <footer class="sidebar-footer">
                <div>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                </div>

                <small>&copy 2023 Blog Station</small>
            </footer>
        </div>
        <!-- Menu Button -->
        <div class="menuButton">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <!-- main -->
        @yield('main')

        <!-- Main footer -->
        <footer class="main-footer">
            <div>
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
            </div>
            <small>&copy 2023 Blog Station</small>
        </footer>
    </div>

    <!-- Click events to menu and close buttons using javaascript-->
    <script>
        document
            .querySelector(".menuButton")
            .addEventListener("click", function() {
                document.querySelector(".sidebar").style.width = "100%";
                document.querySelector(".sidebar").style.zIndex = "5";
            });

        document
            .querySelector(".closeButton")
            .addEventListener("click", function() {
                document.querySelector(".sidebar").style.width = "0";
            });
    </script>

</body>

</html>
