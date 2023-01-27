@extends('layouts.sidebar ')

@section('header')
    <!-- header -->
    <header class="header" style=" background-image: url({{ asset('images/cover_img.jpg') }})">
        <div class="header-text">
            <h1>Blog Station</h1>
            <h4>Home of verified news...</h4>
        </div>
        <div class="overlay"></div>
    </header>
@endsection

@section('main')
    <!-- main -->
    <main class="container">
        <h2 class="header-title">Latest Blog Posts</h2>
        <section class="cards-blog latest-blog">

            @foreach ($posts as $post)
                <div class="card-blog-content">
                    <img src="{{ asset($post->imagePath) }}" alt="" />
                    <p>
                        {{$post->created_at->diffForHumans()}}
                        <span style="float: right">Written By {{$post->user->name}}</span>
                    </p>
                    <h4 style="font-weight: bolder">
                        <a href="{{ route('blog.show', $post) }}">{{$post->title}}</a>
                    </h4>
                </div>
            @endforeach
        </section>
    </main>
@endsection
