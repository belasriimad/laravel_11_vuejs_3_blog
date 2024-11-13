<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display all the categories
     */
    public function index()
    {
        return view('admin.categories.index')->with([
            'categories' => Category::latest()->paginate(5)
        ]);
    }

    /**
     * Display the create category form
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store new category
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|max:255',
            'name_fr' => 'required|max:255'
        ]);

        Category::create([
            'name_en' => $request->name_en,
            'name_fr' => $request->name_fr,
            'slug' => Str::slug($request->name_en)
        ]);

        return redirect()->route('admin.categories.index')->with([
            'success' => 'Category added successfully'
        ]);
    }

    /**
     * Display the edit category form
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with([
            'category' => $category
        ]);
    }

    /**
     * Update category
     */
    public function update(Request $request,Category $category)
    {
        $request->validate([
            'name_en' => 'required|max:255',
            'name_fr' => 'required|max:255'
        ]);

        $category->update([
            'name_en' => $request->name_en,
            'name_fr' => $request->name_fr,
            'slug' => Str::slug($request->name_en)
        ]);

        return redirect()->route('admin.categories.index')->with([
            'success' => 'Category updated successfully'
        ]);
    }

    /**
     * Delete category
     */
    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with([
            'success' => 'Category deleted successfully'
        ]);
    }
}
