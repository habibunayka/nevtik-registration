<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url',
            'status' => 'required|in:open,coming,closed',
            'due' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePath = $request->file('image')->store('public/images');
        $imageUrl = Storage::url($imagePath);

        Post::create([
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'status' => $request->input('status'),
            'due' => $request->input('due'),
            'image' => $imageUrl,
        ]);

        return redirect()->route('admin.index')->with('success', 'Post created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url',
            'status' => 'required|in:open,coming,closed',
            'due' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete($post->image);
            }

            $imagePath = $request->file('image')->store('public/images');
            $imageUrl = Storage::url($imagePath);
        } else {
            $imageUrl = $post->image;
        }

        $post->update([
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'status' => $request->input('status'),
            'due' => $request->input('due'),
            'image' => $imageUrl,
        ]);

        return redirect()->route('admin.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.index')->with('success', 'Post deleted successfully.');
    }
}
