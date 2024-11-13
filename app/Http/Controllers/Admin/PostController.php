<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display all the posts
     */
    public function index()
    {
        return view('admin.posts.index')->with([
            'posts' => Post::latest()->paginate(5)
        ]);
    }

    /**
     * Display create post form
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Store new post
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'body_en' => 'required|max:5000',
            'body_fr' => 'required|max:5000',
            'image' => 'required|image|mimes:png,jpeg,jpg,webp|max:2048',
            'category_id' => 'required'
        ]);

        $file = $request->file('image');
        $image_name = time().'_'.$file->getClientOriginalName();
        $file->storeAs('posts',$image_name,'public');

        Post::create([
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'slug' => Str::slug($request->title_en),
            'body_en' => $request->body_en,
            'body_fr' => $request->body_fr,
            'category_id' => $request->category_id,
            'image' => 'storage/posts/'.$image_name
        ]);

        return redirect()->route('admin.posts.index')->with([
            'success' => 'Post added successfully'
        ]);
    }

    /**
     * Edit post
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit')->with([
            'categories' => $categories,
            'post' => $post
        ]);
    }

    /**
     * Update post
     */
    public function update(Request $request,Post $post)
    {
        $request->validate([
            'title_en' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'body_en' => 'required|max:5000',
            'body_fr' => 'required|max:5000',
            'image' => 'image|mimes:png,jpeg,jpg,webp|max:2048',
            'category_id' => 'required'
        ]);

        if($request->has('image')) {
            $file = $request->file('image');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->storeAs('posts',$image_name,'public');
        }

        $post->update([
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'slug' => Str::slug($request->title_en),
            'body_en' => $request->body_en,
            'body_fr' => $request->body_fr,
            'category_id' => $request->category_id,
            'image' => 'storage/posts/'.$image_name
        ]);

        return redirect()->route('admin.posts.index')->with([
            'success' => 'Post updated successfully'
        ]);
    }

    /**
     * Delete post
     */
    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with([
            'success' => 'Post deleted successfully'
        ]);
    }

}
