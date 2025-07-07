@extends('layouts.app')
@section('page_title', 'Product Register')
@section('content')
   
    <div class="form-container">
        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
               
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Code</label>
                <input type="text" name="code" id="code" value="{{ old('code') }}" class="form-control" required>
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Purchase Price</label>
                <input type="text" name="purchase_price" id="purchase_price" value="{{ old('code') }}" class="form-control" required>
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group">
                <label for="name" class="form-label">Sale Price</label>
                <input type="text" name="sale_price" id="sale_price" value="{{ old('sale_price') }}" class="form-control" required>
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Stock</label>
                <input type="text" name="stock" id="stock" value="{{ old('stock') }}" class="form-control" required>
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
               
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