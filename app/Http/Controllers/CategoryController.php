<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;

use Illuminate\Foundation\Validation\ValidatesRequests;

class CategoryController extends Controller
{
    use ValidatesRequests;


    // Display list of categories
    public function index() 
    { 
        $categories = Category::paginate(5); 
        return view('category.index', ['categories' => $categories]); 
    }

// Show the form
public function create()
{
    return view('category.create'); // blade form view
}

// Store new category data
public function store(Request $request)
{
    $request->validate([
        'category_name' => 'required|string|max:100',
    ]);

    Category::create([
        'category_name' => $request->category_name,
    ]);

    return redirect('/')->with('success', 'Category added successfully.');
}


    // Show edit category form
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', ['category' => $category]);
    }

    // Update category
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|string|max:100'
        ]);

        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();

        return redirect('/');
    }

    // Delete category permanently
    public function destroy($id) 
    { 
        $category = Category::find($id); 
        $category->delete(); 
        
        return redirect('/'); 
    }
}
