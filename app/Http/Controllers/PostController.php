<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        if(!session()->has('lang')) {
            session()->put('lang','en');
        }
        return view('home')->with([
            'posts' => Post::latest()->paginate(10)
        ]);
    }

    public function show(Post $post)
    {
        $next = Post::where('id', '>', $post->id)->orderBy('id')->first();
        $previous = Post::where('id', '<', $post->id)->orderBy('id','desc')->first();
        return view('posts.show')->with([
            'post' => $post,
            'next' => $next,
            'previous' => $previous
        ]);
    }

    public function postsByCategory(Category $category)
    {
        return view('home')->with([
            'posts' => $category->posts()->paginate(10)
        ]);
    }

    public function postsByTag(Tag $tag)
    {
        return view('home')->with([
            'posts' => $tag->posts()->paginate(10)
        ]);
    }

    public function postsByTerm(Request $request)
    {
        $posts = Post::where('title_en','LIKE','%'.$request->searchTerm.'%')
                    ->orWhere('title_fr','LIKE','%'.$request->searchTerm.'%')
                    ->latest()->get();
        return response()->json($posts);
    }
}