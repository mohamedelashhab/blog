<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Gate;

class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'create', 'store']);
    }

    public function index()
    {
        $posts = Post::with('comments')->orderBy('created_at','DESC')->get();
        // dd($posts[0]->comments);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validPost = $request->validate([
            'title' => 'required|max:25',
            'body' => 'required|max:500'
        ]);
        $post = new \App\Post();
        $post->title = $validPost['title'];
        $post->body = $validPost['body'];
        $post->user_id = $request->user()->id;
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if(Gate::allows('update-post', $post))
        {

            return view('posts.form-edit', compact('post'));
        }
        else {
            return redirect()->route('posts.index');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $validPost = $request->validate([
            'title' => 'required|max:25',
            'body' => 'required|max:500'
        ]);
        
        if(Gate::allows('update-post', $post))
        {
            $post->title = $validPost['title'];
            $post->body = $validPost['body'];
            $post->save();
            return redirect()->route('posts.index');
        }
        else {
            return redirect()->route('posts.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
