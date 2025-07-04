@extends('layouts.app')
@section('page_title', 'Order List')
@section('content')
   
<form method="GET" action="{{ route('admin.orders') }}" class="search-form">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Orders.." />
    <button type="submit"><i class="fas fa-search"></i></button>
</form>
    <div class="table-card">
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order ID</th>
                    <th>User</th>
                    <th>Products</th>
                    <th>Total Amount</th>
                    <th>Ordered Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>
                            @foreach($order->orderProducts as $orderProduct)
                                {{ $orderProduct->product->name }} (Qty: {{ $orderProduct->quantity }}, Price: {{ $orderProduct->total_price }})<br>
                            @endforeach
                        </td>
                        <td>{{ $order->total_amount }}</td>
                        <td>{{ $order->ordered_date }}</td>
                        <td>{{ $order->status }}</td>
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