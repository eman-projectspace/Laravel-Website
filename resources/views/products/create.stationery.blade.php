@extends('layouts.app')

@section('title', 'Add Stationery Item')

@section('content')
<div class="container">
    <h2>Add Stationery Item</h2>

    <form action="{{ route('stationery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price (₨)</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Images</label>
            <input type="file" name="images[]" id="images" multiple class="form-control" required>
        </div>

        <input type="hidden" name="category" value="Stationery">

        <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
</div>
@endsection
