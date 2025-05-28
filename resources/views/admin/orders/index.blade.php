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
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
            @php
    $color = match($order->status) {
        'pending' => 'warning',
        'shipped' => 'primary',
        'delivered' => 'success',
        'cancelled' => 'danger',
        default => 'secondary',
    };
@endphp
<td><span class="badge bg-{{ $color }}">{{ ucfirst($order->status) }}</span></td>

                <td>${{ number_format($order->total, 2) }}</td>
                <td>{{ $order->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
