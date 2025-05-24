@extends('layouts.app')

@section('title', $product->title ?? $product->name)

@section('content')
<div class="container py-5">
    <div class="row">
        {{-- Book Cover --}}
        <div class="col-md-5">
          @php
    $image = (!empty($product->images) && is_array($product->images)) 
        ? asset('images/' . $product->images[0]) 
        : asset('images/default-book.png');
@endphp
            <img src="{{ $image }}" alt="{{ $product->title ?? $product->name }}" class="img-fluid rounded shadow-sm" style="max-height: 400px; object-fit: cover;">
        </div>

        {{-- Book Details --}}
        <div class="col-md-7">
            <h1 class="mb-3">{{ $product->title ?? $product->name }}</h1>

            <h4 class="text-primary mb-4">PKR {{ number_format($product->price, 2) }}</h4>

            <dl class="row">
                @if(!empty($product->author))
                <dt class="col-sm-3">Author:</dt>
                <dd class="col-sm-9">{{ $product->author }}</dd>
                @endif

                @if(!empty($product->category))
                <dt class="col-sm-3">Category:</dt>
                <dd class="col-sm-9">{{ $product->category }}</dd>
                @endif

                @if(!empty($product->season))
                <dt class="col-sm-3">Season:</dt>
                <dd class="col-sm-9">{{ $product->season }}</dd>
                @endif

                @if(isset($product->stock))
                <dt class="col-sm-3">Stock:</dt>
                <dd class="col-sm-9">{{ $product->stock > 0 ? $product->stock : 'Out of stock' }}</dd>
                @endif
            </dl>

            {{-- Add to Cart or Action Button --}}
         <form method="POST" action="{{ route('cart.add') }}">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit" class="btn btn-success">
        <i class="bi bi-cart-plus"></i> Add to Cart
    </button>
</form>

        </div>
    </div>
</div>
@endsection
