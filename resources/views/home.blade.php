@extends('layouts.app')

@section('main')
<div id="app">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" >
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
                            <a class="dropdown-item" href="#">
                                Settings
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                          <a></a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


<div class="container" style="padding: 0px">
    <div class="row justify-content-center">
        <div class="col-md-8" style="width: 100%">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="dashboard">
                        <ul style="list-style-type: none">
                            <li><a href="{{route('blog.create')}}">Create Post</a></li>
                            <li><a href="">Create Category</a></li>
                            <li><a href="">Categories List</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
