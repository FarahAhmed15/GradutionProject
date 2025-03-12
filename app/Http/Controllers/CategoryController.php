<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Show all categories
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Show create category form
    public function create()
    {
        return view('categories.create');
    }

    // Store category in the database
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name|max:255',
            'description' => 'required|max:255',
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }

    // Show edit category form
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update category in the database
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name,' . $category->id . '|max:255',
        ]);

        $category->update([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    // Delete a category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
