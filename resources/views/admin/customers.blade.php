@extends('layouts.app')

@section('content')
    <h2 class="section-title">Customer List</h2>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">New</a>
    <div class="search-container">
        <input type="text" placeholder="Search" class="search-input">
    </div>
    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th class="table-header">ID</th>
                    <th class="table-header">Customer Name</th>
                    <th class="table-header">Email</th>
                    <th class="table-header">Address</th>
                    <th class="table-header">Phone</th>
                    <th class="table-header">Last Login</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr class="table-row">
                        <td class="table-cell">{{ $customer->id }}</td>
                        <td class="table-cell">{{ $customer->name }}</td>
                        <td class="table-cell">{{ $customer->email }}</td>
                        <td class="table-cell">{{ $customer->address }}</td>
                        <td class="table-cell">{{ $customer->phone }}</td>
                        <td class="table-cell">{{ $customer->last_login }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination-container">
        <button class="pagination-btn">Previous</button>
        <button class="pagination-btn">1</button>
        <button class="pagination-btn">2</button>
        <button class="pagination-btn">3</button>
        <button class="pagination-btn">Next</button>
    </div>
@endsection