<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $income = 178000;
        $orderCount = 200;
        $profit = 190000;
        $signups = 500;
        return view('admin.dashboard', compact('income', 'orderCount', 'profit', 'signups'));
    }

    public function orders()
    {
        $orders = Order::with('orderProducts.product')->get();
        return view('admin.orders', compact('orders'));
    }

   
    public function users(Request $request)
    {
        $query = User::query();
    
        // 🔍 Search
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }
    
        // 🔃 Sorting
        $sortBy = $request->get('sort_by', 'id');
        $sortOrder = $request->get('sort_order', 'asc');
        $query->orderBy($sortBy, $sortOrder);
    
      
        $users = $query->paginate(10)->appends($request->query());
    
        return view('admin.users', compact('users'));
    }
    
   

    public function customers()
    {
        $customers = User::where('role', 'User')->get();
        return view('admin.customers', compact('customers'));
    }

    public function products(Request $request)
    {
        $query = Product::query()->with('category');
    
       
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%")
                  ->orWhereHas('category', function ($categoryQuery) use ($search) {
                      $categoryQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }
    
        $products = $query->get();
    
        return view('admin.products', compact('products'));
    }

    public function categories(Request $request)
    {
        $query = Category::query();
    
        // 🔍 Search
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', "%{$search}%");
        }
    
        $categories = $query->get();
    
        return view('admin.categories', compact('categories'));
    }

    public function storeUser(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'role' => 'required|in:Admin,User',
                'address' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'dob' => 'nullable|date',
            ]);
    
            // Create the user
            User::create($validatedData);
    
            // Redirect with success message
            return redirect()->route('admin.users')->with('success', 'User created successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation errors will automatically be handled by Laravel, 
            // but you can customize the redirect with errors if needed
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions (e.g., database errors)
            return redirect()->back()->with('error', 'Failed to create user: ' . $e->getMessage())->withInput();
        }
    }
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:Admin,User',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'dob' => 'nullable|date',
        ]));
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }

    public function storeProduct(Request $request)
    {
        Product::create($request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:products,code',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]));
        return redirect()->route('admin.products')->with('success', 'Product created successfully');
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:products,code,' . $id,
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]));
        return redirect()->route('admin.products')->with('success', 'Product updated successfully');
    }

    public function storeCategory(Request $request)
    {
        Category::create($request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]));
        return redirect()->route('admin.categories')->with('success', 'Category created successfully');
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]));
        return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function createProduct()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function createCategory()
    {
        return view('admin.categories.create');
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }
}