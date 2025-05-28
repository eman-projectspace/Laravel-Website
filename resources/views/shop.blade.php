@extends('layouts.app')

@section('title', 'Book Catalog')

@section('content')
<style>
    @media (max-width:750px) {
        .row {
            margin-left: 60px;
        }
    }

    .card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }

    .btn-dark:hover {
        background-color: #3e2723;
        transform: scale(1.05);
    }

    #book-txt {
        font: 1em sans-serif;
        font-size: 50px;
        margin-bottom: 50px;
        text-align: center;
        color: brown;
    }

        /* Custom styles for the filter form */
   /* Filter Bar Container */
  .filter-bar {
    background-color: #f5f0e6; /* cream */
    padding: 12px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(101, 67, 33, 0.2);
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    align-items: center;
    justify-content: center;
    margin-bottom: 40px;
    font-family: 'Georgia', serif;
  }

  /* Input styling */
  .filter-bar input[type=number] {
    width: 150px;
    border: 2px solid #5d4037; /* dark brown */
    border-radius: 6px;
    padding: 8px 12px;
    font-size: 1rem;
    color: #3e2723;
    background-color: #fff8f0;
    transition: border-color 0.3s ease, background-color 0.3s ease;
  }

  .filter-bar input[type=number]::placeholder {
    color: #7b5e57; /* lighter brown */
    font-style: italic;
  }

  .filter-bar input[type=number]:focus {
    border-color: #8d6e63; /* medium brown */
    background-color: #fff3e0;
    box-shadow: 0 0 6px #8d6e63;
    outline: none;
  }

  /* Button styling */
  .filter-bar button {
    background-color: #6d4c41; /* brown */
    border: none;
    color: #fff3e0; /* cream */
    font-weight: 600;
    padding: 10px 25px;
    border-radius: 6px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(109, 76, 65, 0.6);
    transition: background-color 0.3s ease, transform 0.2s ease;
    font-family: 'Georgia', serif;
  }

  .filter-bar button:hover {
    background-color: #5d4037; /* darker brown */
    transform: scale(1.05);
  }

  /* Responsive adjustments */
  @media (max-width: 480px) {
    .filter-bar {
      justify-content: center;
      gap: 10px;
    }

    .filter-bar input[type=number] {
      width: 100px;
      padding: 6px 10px;
      font-size: 0.9rem;
    }

    .filter-bar button {
      padding: 8px 20px;
      font-size: 0.9rem;
    }
  }

</style>

<div class="container py-5">
    <h1 id="book-txt">📚 Book Catalog</h1>

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
                                 style="height: 200px; width: 100%;">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" 
                                 alt="Default Book Cover" 
                                 class="card-img-top rounded-top-4" 
                                 style="height: 300px; object-fit: cover;">
                        @endif

                        <div class="card-body d-flex flex-column bg-light rounded-bottom-4" style="padding: 10px 15px;">
                            <h5 class="card-title fw-semibold text-dark fs-6">{{ $product->title ?? 'Untitled' }}</h5>
                            <p class="card-text text-muted mb-2 fs-7">Author: {{ $product->author ?? 'Unknown' }}</p>
                            <p class="card-text fs-5 fw-bold text-success mb-3">PKR {{ number_format($product->price, 2) }}</p>

                            <a href="{{ url('/product/' . $product->id) }}" class="btn btn-outline-primary mt-auto fw-bold btn-sm">
                                View Details →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination  -->
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    @endif
</div>


<form method="GET" action="{{ route('shop.index') }}" class="filter-bar">
  <input type="number" name="min_price" placeholder="Min Price" value="{{ request('min_price') }}" min="0" step="any"/>
  <input type="number" name="max_price" placeholder="Max Price" value="{{ request('max_price') }}" min="0" step="any"/>
  <button type="submit">Filter</button>
</form>
@endsection
