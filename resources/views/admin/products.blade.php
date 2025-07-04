@extends('layouts.app')
@section('page_title', 'Produdct List')
@section('content')
<div class="user-list-container">
    <div class="user-list-controls">
        <a href="{{ route('admin.products.create') }}" class="btn-new">
            <i class="fas fa-plus icon"></i> New
        </a>

        <form method="GET" action="{{ route('admin.products') }}" class="search-form">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." />
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
        
      
    </div>
    <div class="table-card">
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Purchase Price</th>
                    <th>Sale Price</th>
                    <th>Stock</th>
                    <th>Last Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->purchase_price }}</td>
                        <td>{{ $product->sale_price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            <button class="pagination-arrow">&lt;</button>
            <button class="pagination-item active">1</button>
            <button class="pagination-item">2</button>
            <button class="pagination-item">3</button>
            <span class="pagination-ellipsis">...</span>
            <button class="pagination-item">40</button>
            <button class="pagination-arrow">&gt;</button>
        </div>
    </div>
   
@endsection