<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::latest()->paginate(10);
        return view("post.index", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {
        //
        $post = new Post();
        $post->title = $request->input("title");
        $post->published = $request->boolean("published");
        $post->body = $request->input("body");
        $post->author = $request->input("author");
        $post->save();
        return redirect("/blog")->with("success", "post added successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::findOrFail($id);
        return view("post.show", ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        return view("post.edit", ["post" => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, string $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->title = $request->input("title");
        $post->published = $request->boolean("published");
        $post->body = $request->input("body");
        $post->author = $request->input("author");
        $post->save();
        return redirect("/blog")->with("success", "Post updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect("/blog")->with("success", "Post deleted successfully");

    }
}
