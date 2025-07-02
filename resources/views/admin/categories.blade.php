@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Category List</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-new">New</a>
    <div class="mb-4">
        <input type="text" placeholder="Search" class="search-bar">
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Last Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->updated_at }}</td>
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