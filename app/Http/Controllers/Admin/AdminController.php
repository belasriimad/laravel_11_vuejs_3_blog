<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Admin dashboard
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();

        return view('admin.dashboard')->with([
            'categories' => $categories,
            'posts' => $posts
        ]);
    }

    /**
     * Display the login form
     */
    public function login()
    {
        if(!auth()->guard('admin')->check()) {
            return view('admin.login');
        }

        return redirect()->route('admin.index');
    }

     /**
     * Login the admin
     */
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        if(auth()->guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }else {
            return redirect()->route('admin.login')->with([
                'error' => 'These credentials do not match any of our records'
            ]);
        }
    }

    /**
     * Logout the admin
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
