<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::paginate(2);
        return view('products.index',compact('products'));
    }
    public function create()
    { $categories = Category::all(); // ✅ Get all categories from DB
        return view('products.create', compact('categories'));
      
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'code' => 'required|string|max:50', // Changed to string, adjust max length as needed
            'purchased_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id', // Use category_id as foreign key
            'description' => 'required|string',
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName); 
            $imagePath = 'images/' . $imageName;
        }
    
        Product::create([
            'name' => $request->name,
            'image' => $imagePath,
            'code' => $request->code,
            'purchased_price' => $request->purchased_price,
            'sale_price' => $request->sale_price,
            'stock' => $request->stock,
            'category_id' => $request->category_id, // Use category_id instead of category
            'description' => $request->description,
        ]);
    
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

 public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); 
    
        return view('products.edit', compact('product', 'categories'));
       
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
      
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $product->image; 
        }
    
      
        $product->update([
            'name' => $request->name,
            'code' => $request->code,
            'purchased_price' => $request->purchased_price,
            'sale_price' => $request->sale_price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $imagePath,
        ]);
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }
    
    public function destroy(string $id)
    {
        $Product = Product::findOrFail($id);
        $Product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
