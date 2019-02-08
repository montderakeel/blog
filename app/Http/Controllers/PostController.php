<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::all()->toArray();
        return view('post.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'img' => 'image|max:2048'
        ]);
        if ($request->hasFile('img')) {
            $img = $request->file('img')->store('public/posts');
        } else{
            $img = 'https://www.elegantthemes.com/blog/wp-content/uploads/2017/08/featuredimage.jpg';
        }

        $post = new Post;
        $post->title    = $request['title'];
        $post->content  = $request['content'];
        $post->img    = $img;
        $post->user_id  = \Auth::user()->id;
        $post->category_id = $request['category'];

        if ($post->save()) {
            return redirect(route('post.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   
        $categories = \App\Category::all()->toArray();
        return view('post.edit')->withPost($post)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->category_id = $request['category_id'];
        $post->update();

        return redirect(route('post.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->destroy($post->id);

        return redirect()->back()->with('success', 'Post Has Deleted Successfully');
    }
}
