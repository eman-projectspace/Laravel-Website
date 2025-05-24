@extends('layouts.app')

@section('title', 'Add New Book')

@section('content')
    <h1 class="mb-4">Add New Book</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="title" class="form-label">Book Title</label>
<input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" id="author" class="form-control">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price ($)</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Book Cover (Image)</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple required>
        </div>

        <button type="submit" class="btn btn-success">Add Book</button>
    </form>
@endsection
