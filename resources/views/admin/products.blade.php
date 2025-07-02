@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Product List</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-new">New</a>
    <div class="mb-4">
        <input type="text" placeholder="Search" class="search-bar">
    </div>
    <div class="table-container">
        <table>
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
    </div>
    <div class="pagination">
        <button>Previous</button>
        <button>1</button>
        <button>2</button>
        <button>3</button>
        <button>Next</button>
    </div>
@endsection