<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('dashboard.posts.index');
    }

    public function create()
    {
        return view('dashboard.posts.create', [
            'tags'  => Tag::all(),
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        return $request;
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        File::delete(public_path('img/blob/' . $post->cover_image));
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post successfully deleted!');
    }
}
