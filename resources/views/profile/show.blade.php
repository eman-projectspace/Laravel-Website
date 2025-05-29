@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 600px;">
    <h2 class="mb-4">My Profile</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            @if ($user->profile_picture)
    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="img-thumbnail mb-3" width="150">
@else
    <img src="{{ asset('images/default-avatar.png') }}" alt="Default Profile Picture" class="img-thumbnail mb-3" width="150">
@endif

            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <!-- Add more fields if needed -->

            <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
