@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">🛒 Your Shopping Cart</h2>

    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if(empty($cart))
        <div class="alert alert-warning text-center">Your cart is empty!</div>
    @else
        <table class="table table-bordered shadow-sm bg-white">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $total = $item['price'] * $item['quantity']; @endphp
                    @php $grandTotal += $total; @endphp
                    <tr>
                        <td><img src="{{ asset('images/' . $item['image']) }}" width="60"></td>
                        <td>{{ $item['title'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                       <td>
    <form method="POST" action="{{ route('cart.update') }}" class="d-flex">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
       <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
       class="form-control form-control-sm me-1" style="width: 60px;">
        <button type="submit" class="btn btn-sm btn-primary">Update</button>
    </form>
</td>

                        <td>${{ number_format($total, 2) }}</td>
                        <td>
                            <form method="POST" action="{{ route('cart.remove') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr class="fw-bold">
                    <td colspan="4" class="text-end">Grand Total:</td>
                    <td>${{ number_format($grandTotal, 2) }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="text-end mt-4">
    <a href="{{ route('checkout.form') }}" class="btn btn-success btn-lg">
        Proceed to Checkout
    </a>
</div>

    @endif
</div>
@endsection
