@extends('layouts.app')

@section('title', 'History Books')

@section('content')
<div class="container py-5">
    <h1 class="mb-5 text-center display-4 fw-bold text-primary">📖 History Books</h1>

    @if ($books->isEmpty())
        <div class="alert alert-warning text-center fs-5 shadow-sm">
            No history books available at the moment.
        </div>
    @else
        <div class="row">
            @foreach ($books as $product)
                <div class="col-md-3 col-sm-6 mb-4 d-flex align-items-stretch">
                    <div class="card shadow-lg w-100 border-0 rounded-4" style="max-width: 320px;">
                        @php
                            $firstImage = is_array($product->images) ? $product->images[0] : null;
                        @endphp

                        @if($firstImage)
                            <img src="{{ asset('images/' . $firstImage) }}" alt="{{ $product->title }}" class="card-img-top rounded-top-4" style="height: 200px;">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" alt="Default" class="card-img-top rounded-top-4" style="height: 200px;">
                        @endif

                        <div class="card-body d-flex flex-column bg-light rounded-bottom-4" style="padding: 10px 15px;">
                            <h5 class="card-title fw-semibold text-dark fs-6">{{ $product->title }}</h5>
                            <p class="card-text text-muted mb-2 fs-7">👩‍💼 Author: {{ $product->author }}</p>
                            <p class="card-text fs-5 fw-bold text-success mb-3">PKR {{ number_format($product->price, 2) }}</p>
                            <a href="{{ url('/product/' . $product->id) }}" class="btn btn-outline-primary mt-auto fw-bold btn-sm">View Details →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
