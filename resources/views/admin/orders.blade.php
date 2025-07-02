@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Order List</h1>
    <div class="mb-4">
        <input type="text" placeholder="Search" class="search-bar">
    </div>
    <div class="table-container">
        <table>
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
        <button>Previous</button>
        <button>1</button>
        <button>2</button>
        <button>3</button>
        <button>Next</button>
    </div>
@endsection