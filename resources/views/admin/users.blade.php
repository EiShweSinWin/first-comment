@extends('layouts.app')

@section('page_title', 'User List')

@section('content')

<div class="user-list-container">
    <div class="user-list-controls">
        <a href="{{ route('admin.users.create') }}" class="btn-new">
            <i class="fas fa-plus icon"></i> New
        </a>

        <form method="GET" action="{{ route('admin.users') }}" class="search-form">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search users..." />
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
        
      
    </div>

    <div class="table-card">
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID <i class="fas fa-sort sort-icon"></i></th>
                    <th>User Name <i class="fas fa-sort sort-icon"></i></th>
                    <th>Email <i class="fas fa-sort sort-icon"></i></th>
                    <th>Role <i class="fas fa-sort sort-icon"></i></th>
                    <th>Address <i class="fas fa-sort sort-icon"></i></th>
                    <th>Phone <i class="fas fa-sort sort-icon"></i></th>
                    <th>Last Login <i class="fas fa-sort sort-icon"></i></th>
                </tr>
            </thead>
            <tbody>
              

                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->last_login }}</td>
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
</div>

@endsection