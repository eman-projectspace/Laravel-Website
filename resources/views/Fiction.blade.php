@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-3">Fiction Books</h1>
    <p class="text-center mb-4 text-secondary fs-6">
        Explore our stunning collection of fiction books.
    </p>

    <div class="row g-3">
        @forelse($books as $book)
            <div class="col-md-3 col-sm-6">  <!-- smaller columns -->
                <div class="card h-100 shadow-sm book-card">
                    @if (!empty($book->images) && isset($book->images[0]))
                        <img src="{{ asset('images/' . $book->images[0]) }}" class="card-img-top book-image" alt="{{ $book->title }}">
                    @else
                        <img src="{{ asset('images/default-book.jpg') }}" class="card-img-top book-image" alt="Default Image">
                    @endif
                    <div class="card-body p-2 d-flex flex-column">
                        <h6 class="card-title mb-1">{{ $book->title }}</h6>
                        <p class="card-text text-truncate mb-1">{{ Str::limit($book->description, 60) }}</p>
                        <p class="text-muted mb-1"><small>Author: {{ $book->author }}</small></p>
                        <p class="fw-bold mb-0 mt-auto fs-6 text-primary">Rs. {{ $book->price }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center fs-6 text-muted">No fiction books found.</p>
        @endforelse
    </div>
</div>

<style>
    .book-card {
        border-radius: 8px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        font-size: 0.85rem;
    }
    .book-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.1);
    }
    .book-image {
        height: 180px;  /* smaller height */
        object-fit: cover;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }
    .card-title {
        font-weight: 600;
        font-size: 1rem;
        line-height: 1.1;
    }
    .card-text {
        color: #555;
        flex-grow: 1;
        margin-bottom: 0.25rem;
    }
</style>
@endsection
