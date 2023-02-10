@extends('layouts.sidebar')

@section('main')
<!-- main -->
<main class="container">
    <h2 class="header-title">All Blog Posts</h2>
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
        <img src="{{asset($post->imagePath)}}" alt="" />
        <p>
          {{$post->created_at->diffForHumans()}}
          <span>Written By {{$post->user->name}}</span>
        </p>
        <h4>
          <a href="{{route('blog.show', $post)}}">{{$post->title}}</a>
        </h4>
      </div>
      @empty
      <p style="width: 1045px; text-align: center; padding: 62px;">Sorry, currently there is no no such blog post!</p>
    @endforelse

    </section>

      <!-- pagination -->
      {{$posts->links('pagination::default')}}

  </main>
  <br>
@endsection
