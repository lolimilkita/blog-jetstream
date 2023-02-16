<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
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

    public function store(PostRequest $request)
    {
        // $tags                       = explode(',', $request->tags);
        $post                       = new Post;
        $post->title                = $request->title;
        $post->slug                = Str::slug($request->title);
        $post->body                 = $request->body;
        $post->author_id            = Auth()->user()->id;
        $post->category_id          = $request->category_id;
        $post->meta_description     = $request->meta_description;
        $post->published_at         = $request->published_at;

        if($request->hasFile('cover_image')){
            $image          = $request->file('cover_image');
            $imageName      = $image->getClientOriginalName();
            $imageNewName   = date_format(now(), "YmdHis") . mt_rand(1, 1000) . $imageName;
            // 12122022121212.pic.png
            $location       = storage_path('app/public/images/' . $imageNewName);
            Image::make($image)->resize(1200, 630)->save($location);

            $post->cover_image = $imageNewName;
        }

        $post->save();
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $oldTags = $post->tags->pluck('id')->toArray();
        // return $oldTags;
        return view('dashboard.posts.edit', compact('post', 'tags', 'categories', 'oldTags'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title                = $request->title;
        $post->slug                = Str::slug($request->title);
        $post->body                 = $request->body;
        $post->author_id            = Auth()->user()->id;
        $post->category_id          = $request->category_id;
        $post->meta_description     = $request->meta_description;
        $post->published_at         = $request->published_at;

        if($request->hasFile('cover_image')){
            $oldFileName    = $post->cover_image;
            $image          = $request->file('cover_image');
            $imageName      = $image->getClientOriginalName();
            $imageNewName   = date_format(now(), "YmdHis") . mt_rand(1, 1000) . $imageName;
            // 12122022121212.pic.png
            $location       = storage_path('app/public/images/' . $imageNewName);
            Image::make($image)->resize(1200, 630)->save($location);

            $post->cover_image = $imageNewName;

            File::delete(storage_path('app/public/images/' . $oldFileName));
        }

        $post->save();
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Post successfully update!');
    }

    public function destroy(Post $post)
    {
        File::delete(public_path('img/blob/' . $post->cover_image));
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post successfully deleted!');
    }
}
