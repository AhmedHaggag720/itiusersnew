<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::simplepaginate(15);
        // $posts = Post::simplepaginate(15);
        // return view('posts.index')->with(['posts' => $posts]);
        return view('posts.index')->with(['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validatedData = $req->validate(['title' => 'required:posts|max:100', 'body' => 'required:posts|max:1000',]);

        $posts = Post::simplepaginate(15);
        $title = $req->input('title');
        $body = $req->input('body');
        $enabled = $req->input('enabled');
        $image = $req->input('image');
        $enabled = 'on' ? $enabled = '1' : $enabled = '0';
        $published_at = date("Y-m-d H:i:s", strtotime('now'));
        $user_id = auth()->id();


        if ($req->hasfile('image')) {
            $image = $req->file('image')->store('posts', 'public');
        }

        if ($validatedData) {
            Post::create(['title' => $title, 'body' => $body, 'enabled' => $enabled, 'published_at' => $published_at, 'user_id' => $user_id, 'image' => $image]);
            return redirect()->route('posts.index');
        } else return 'Too much Text!';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        return view('posts.show')->with(['posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Post::find($id);
        if (auth()->id() == $user_id->user_id) {
            return view('posts.edit')->with(['post' => Post::find($id), 'id' => $id]);
        }
        return redirect('/posts');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $validatedData = $req->validate(['title' => 'required:posts|max:100', 'body' => 'required:posts|max:1000',]);

        $user_id = Post::find($id);
        if (auth()->id() == $user_id->user_id) {
            if (Post::find($id)->update(['title' => $req->input('title'), 'body' => $req->input('body')])) {
                return redirect()->route('posts.index');
            }
        }
        return redirect()->back();

        $posts = Post::simplepaginate(15);
        $title = $req->input('title');
        $body = $req->input('body');
        if ($validatedData) {
            Post::find($id)->update(['title' => $title, 'body' => $body]);
            return redirect()->route('posts.index');
        } else return 'Too much Text!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Post::find($id)->delete();
        return redirect()->route('posts.index');
    }

    public function restore()
    {
        $posts = Post::onlyTrashed()->simplepaginate(15);
        return view('posts.restore')->with(['posts' => $posts]);
    }

    public function restoredeleted($id)
    {

        Post::onlyTrashed()->find($id)->restore();
        return redirect()->route('posts.restore');
    }
}
