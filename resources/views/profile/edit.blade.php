@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profile</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
    <label>Profile Picture:</label>
    <input type="file" name="profile_picture" class="form-control">
</div>

@if ($user->profile_picture)
    <div class="mb-3">
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="img-thumbnail" width="150">
    </div>
@endif


        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
<!-- http://127.0.0.1:8000/profile/edit -->