<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::paginate(2);
        return view('categories.index',compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
           
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('image'), $imageName);
            $imagePath = 'image/' . $imageName;
        }
    
        Category::create([
            'name' => $request->name,
           
            'image' => $imagePath
        ]);
    
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }
    

 public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    { $category = Category::findOrFail($id);
       
        $imagePath = $category->image;
        $category = Category::find($id);
        $category->update(['name' => $request->name,
       
        'image' => $imagePath]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}