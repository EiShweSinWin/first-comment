@extends('layouts.app')
@section('page_title', 'Category List')
@section('content')

<div class="user-list-controls">
    <a href="{{ route('admin.categories.create') }}" class="btn-new">
        <i class="fas fa-plus icon"></i> New
    </a>

    <form method="GET" action="{{ route('admin.categories') }}" class="search-form">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Category.." />
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
    
  
</div>
    <div class="table-card">
        <table class="user-table">
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
        <button class="pagination-arrow">&lt;</button>
        <button class="pagination-item active">1</button>
        <button class="pagination-item">2</button>
        <button class="pagination-item">3</button>
        <span class="pagination-ellipsis">...</span>
        <button class="pagination-item">40</button>
        <button class="pagination-arrow">&gt;</button>
    </div>
@endsection