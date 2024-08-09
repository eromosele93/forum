<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class MyPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $posts = auth()->user()->posts()->latest()->withTrashed()->get();
       return view('my-post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my-post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:10',
            'category' => 'required',
            'post' => 'required|min:20',
            
        ]);


        auth()->user()->posts()->create([
             
            'title' => $validatedData['title'],
            'post' => $validatedData['post'],
            'category' => $validatedData['category'],
        ]);
        return redirect()->route('my-posts.index')->with('success', 'Post added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $my_post)
    {
        $this->authorize('delete', $my_post);
        $my_post->delete();
        return redirect()->route('my-posts.index')->with('success', 'Post Deleted Successfully');
    }
}
