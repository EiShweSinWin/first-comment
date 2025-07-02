@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Product Update</h1>
    <div class="form-container">
        <form method="POST" action="{{ route('admin.products.update', $product->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" name="code" id="code" value="{{ $product->code }}" required>
            </div>
            <div class="form-group">
                <label for="purchase_price">Purchase Price</label>
                <input type="number" name="purchase_price" id="purchase_price" value="{{ $product->purchase_price }}" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="sale_price">Sale Price</label>
                <input type="number" name="sale_price" id="sale_price" value="{{ $product->sale_price }}" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" value="{{ $product->stock }}" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description">{{ $product->description }}</textarea>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-register">Save</button>
                <a href="{{ route('admin.products') }}" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection