<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search){
            $posts = Post::where('title', 'like', '%'. $request->search . '%')
            ->orWhere('title', 'like', '%'. $request->search . '%')->latest()->paginate(4);
        }
        else{
            $posts = Post::latest()->paginate(4);
        }


        return view('post.blog', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create-blog-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=> 'required',
            'image'=> 'required | image',
            'body'=> 'required'

        ]);

        $title = $request->input('title');
        $postId = Post::latest()->take(1)->first()->id + 1;
        $slug = Str::slug($title, '-'). '-'. $postId;
        $user_id = Auth::user()->id;
        $body = $request->input('body');


        $imagePath = 'storage/' . $request->file('image')->store('img', 'public');


        $post = new Post();
        $post->title = $title;
        $post->slug = $slug;
        $post->user_id = $user_id;
        $post->body = $body;
        $post->imagePath = $imagePath;


        $post->save();

        return redirect()->back()->with('status','The post has been created successfully');

    //Old method
        /* $post = Post::create([
            'title' => $request->title,
            'slug'=> $request->slug,
            'user_id'=>$request->user_id,
            'body' => $request->body,

        ]);
        $imagePath = 'storage/' . $request->file('image')->store('img', 'public');


        $post->update([
            'image' =>$imagePath,
        ]);
        return redirect()->route('post.blog'); */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function show($slug)
    {
         $post = Post::where('slug', $slug)->first();
        return view('post.details', compact('post'));
    }
    */


    //Route model binding
    public function show(Post $post){
        return view('post.details', compact('post'));
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* if(auth()->user()->id !== $post->user->id){
            abort(403);
        } */
        $posts = Post::find($id);
        return view('post.edit-post', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* public function update(Request $request, Post $post)
    {

        $request->validate([
            'title'=> 'required',
            'image'=> 'required | image',
            'body'=> 'required'

        ]);

        $title = $request->input('title');
        $postId = $post->id;
        $slug = Str::slug($title, '-'). '-'. $postId;
        $body = $request->input('body');


        $imagePath = 'storage/' . $request->file('image')->store('img', 'public');


        $post->title = $title;
        $post->slug = $slug;
        $post->body = $body;
        $post->imagePath = $imagePath;


        $post->update();
        return redirect()->back()->with('status','The post has been updated successfully');



    } */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update([
            'title'=> $request->title,

            'body'=> $request->body,

        ]);

        $imagePath = 'storage/' . $request->file('image')->store('img', 'public');

        $post->update([
            'imagePath' =>$imagePath,
        ]);

        return redirect()->route('home')->with('status','The post has been updated successfully');
    }
   /*  public function update(Request $request, $id)
    {
        $post = Post::create([
            'title' => $request->title,
            'slug'=> $request->slug,
            'user_id'=>$request->user_id,
            'body' => $request->body,

        ]);
        $imagePath = 'storage/' . $request->file('image')->store('img', 'public');


        $post->update([
            'image' =>$imagePath,
        ]);
        return redirect()->route('home');
    } */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        return redirect()->route('home');
    }
}
