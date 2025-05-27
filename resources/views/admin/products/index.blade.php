@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>All Products</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>In Stock</th>
                <th>Created At</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
              <td>{{ $product->product_name }}</td> 
                <td>{{ $product->category }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->created_at->format('Y-m-d') }}</td>
                <td>
    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>

    <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger">Delete</button>
    </form>
</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
