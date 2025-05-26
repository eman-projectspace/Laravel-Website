{{-- resources/views/Fiction.blade.php --}}
@extends('layouts.app') {{-- or the layout you're using like index.blade.php if it's your main layout --}}

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Toys </h1>
    <p class="text-center">Explore our stunning collection of fiction-themed dresses.</p>

    {{-- Add your dress listings here --}}
    <div class="row">
        <!-- Example dress card -->
        <div class="col-md-4">
            <div class="card">
                <img src="path-to-dress.jpg" class="card-img-top" alt="Dress">
                <div class="card-body">
                    <h5 class="card-title">Fantasy Gown</h5>
                    <p class="card-text">A magical dress for special occasions.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
