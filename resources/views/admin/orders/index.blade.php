@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>All Orders</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Customer Name</th>
                <th>Status</th>
                <th>Total</th>
                <th>Ordered At</th>
                <th>Items</th> <!-- New column for items -->
            </tr>
        </thead>
        <tbody>
            @foreach($recentOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td><span class="badge bg-secondary">{{ ucfirst($order->status) }}</span></td>
                    <td>${{ number_format($order->total, 2) }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>
                        <ul class="mb-0">
                            @foreach($order->items as $item)
                                <li>{{ $item->product->title ?? 'Product not found' }} — Qty: {{ $item->quantity }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
