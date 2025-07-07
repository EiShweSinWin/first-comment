<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App;
use Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
   

    public function index()
{
    $products = Product::all(); // သို့မဟုတ် paginate(), latest() etc.
    return view('home', compact('products'));
}
}
