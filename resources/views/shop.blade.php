@extends('layouts.app')

@section('title', 'Book Catalog')

@section('content')
<div class="container py-5">
    <h1 class="mb-5 text-center display-4 fw-bold text-primary">📚 Book Catalog</h1>

    @if ($products->isEmpty())
        <div class="alert alert-warning text-center fs-5 shadow-sm">
            No books available at the moment. Please check back later.
        </div>
    @else
        <div class="row">
            @foreach ($products as $product)
              <div class="col-md-3 col-sm-6 mb-4 d-flex align-items-stretch">
                 <div class="card shadow-lg w-100 border-0 rounded-4" style="max-width: 320px;">
                        @php
                            $firstImage = is_array($product->images) ? $product->images[0] : null;
                        @endphp

                        @if($firstImage)
                            <img src="{{ asset('images/' . $firstImage) }}" 
                                 alt="{{ $product->title ?? 'Book Cover' }}" 
                                 class="card-img-top rounded-top-4" 
                                 style="height: 200px;widht: 100%;">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" 
                                 alt="Default Book Cover" 
                                 class="card-img-top rounded-top-4" 
                                 style="height: 300px; object-fit: cover;">
                        @endif

                              <div class="card-body d-flex flex-column bg-light rounded-bottom-4" style="padding: 10px 15px;">
            <h5 class="card-title fw-semibold text-dark fs-6">{{ $product->title ?? 'Untitled' }}</h5>
            <p class="card-text text-muted mb-2 fs-7">👩‍💼 Author: {{ $product->author ?? 'Unknown' }}</p>
            <p class="card-text fs-5 fw-bold text-success mb-3">PKR {{ number_format($product->price, 2) }}</p>

            <a href="{{ url('/product/' . $product->id) }}" class="btn btn-outline-primary mt-auto fw-bold btn-sm">
                View Details →
            </a>
        </div>
    </div>
</div>
            @endforeach
        </div>
    @endif
</div>
@endsection
