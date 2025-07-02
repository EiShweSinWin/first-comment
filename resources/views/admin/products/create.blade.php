@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Product Register</h1>
    <div class="form-container">
        <form method="POST" action="{{ route('admin.products.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" name="code" id="code" required>
            </div>
            <div class="form-group">
                <label for="purchase_price">Purchase Price</label>
                <input type="number" name="purchase_price" id="purchase_price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="sale_price">Sale Price</label>
                <input type="number" name="sale_price" id="sale_price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-register">Register</button>
                <a href="{{ route('admin.products') }}" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection