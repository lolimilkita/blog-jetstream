<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
        //
    }
}
