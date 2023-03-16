@extends('layouts.app')

@section('main')
    <div id="app">
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
        <!-- main -->
        <main class="container">
            <h2 class="header-title">My Blog Posts</h2>
            @if (session('status'))
            <p style="color:#fff; width:100%; font-size:18px; font-weight:600; text-align:center; background: #4C7450; padding:17px 0px; margin-bottom:6px">{{session('status')}}</p>
        @endif
        <br>
            <div class="searchbar">
                <form action="" style="padding-bottom: 30px;">
                    <input type="text" placeholder="Search..." name="search" />

                    <button type="submit">
                        <i class="fa fa-search"></i>
                    </button>

                </form>
            </div>
            <section class="cards-blog latest-blog">

                @forelse ($posts as $post)
                    <div class="card-blog-content">
                        @auth
                            @if (auth()->user()->id === $post->user->id)
                                <div class="post-buttons">
                                    <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-primary">
                                        Edit
                                    </a>
                                    <a href="{{ route('blog.delete', $post->id) }}" class="btn btn-primary">
                                        Delete
                                    </a>
                                </div>
                                <img src="{{ asset($post->imagePath) }}" alt="" />
                                <p>
                                    {{ $post->updated_at->diffForHumans() }}
                                    <span>Written By {{ $post->user->name }}</span>
                                </p>
                                <h4>
                                    <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                                </h4>
                            @endif
                        @endauth
                    </div>
                    @empty
                    <p style="width: 1045px; text-align: center; padding: 62px; font-size: 24px;">  Not Found </p>
                @endforelse
            </section>

            <!-- pagination -->
            {{$posts->links('pagination::default')}}

        </main>
        <br>
    @endsection
