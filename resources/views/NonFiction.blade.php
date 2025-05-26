@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Non-Fiction Books</h1>
    <p class="text-center">Elegant and educational non-fiction books inspired by real-world experiences.</p>

    <div class="row">
        @forelse($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if (!empty($book->images) && isset($book->images[0]))
                        <img src="{{ asset('storage/' . $book->images[0]) }}" class="card-img-top" alt="{{ $book->title }}">
                    @else
                        <img src="{{ asset('images/default-book.jpg') }}" class="card-img-top" alt="Default Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ Str::limit($book->description, 100) }}</p>
                        <p class="text-muted">Author: {{ $book->author }}</p>
                        <p class="fw-bold">Price: Rs. {{ $book->price }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">No non-fiction books found.</p>
        @endforelse
    </div>
</div>
@endsection
