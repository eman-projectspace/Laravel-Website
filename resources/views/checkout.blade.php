@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">🧾 Checkout</h2>

    <form method="POST" action="{{ route('checkout.process') }}">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>

        <h5>Total: ${{ number_format($grandTotal, 2) }}</h5>

        <button type="submit" class="btn btn-primary mt-3">Place Order</button>
    </form>
</div>
@endsection
