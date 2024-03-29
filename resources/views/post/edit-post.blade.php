@extends('layouts.sidebar')
@section('head')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
@endsection
@section('main')
    <main class="container" style="background-color: #fff;">
        <section id="contact-us">
            <h1 style="padding-top: 50px;">Edit Post</h1>

            <!-- Contact Form -->
            <div class="contact-form">
                <form action="{{route('blog.update', $posts->id)}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <!-- Title -->
                    <label for="title"><span>Title</span></label>
                    <input type="text" id="title" name="title" value="{{$posts->title}}" />
                    @error('title')
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror
                    <!-- Image -->
                    <label for="image"><span>Image</span></label>
                    <input type="file" id="image" name="image" />
                    @error('image')
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror
                    <!-- Body-->
                    <label for="body"><span>Body</span></label>
                    <textarea id="body" name="body">{{$posts->body}} </textarea>
                    @error('body')
                        <p style="color: red; margin: 20px 0px 10px 0px">{{ $message }}</p>
                    @enderror
                    <br>

                    <!-- Button -->
                    <input type="submit" value="Update" />
                </form>
            </div>
            <br>
            @if (session('status'))
            <p style="color:#fff; width:100%; font-size:18px; font-weight:600; text-align:center; background: #4C7450; padding:17px 0px; margin-bottom:6px">{{session('status')}}</p>
        @endif
            <br>

        </section>
    </main>
@endsection

@section('scripts')
<script>
    CKEDITOR.replace( 'body' );
</script>
@endsection


