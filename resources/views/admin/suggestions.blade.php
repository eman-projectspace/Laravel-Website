@extends('admin.layout')

@section('title', 'User Suggestions')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">User Suggestions</h2>

    @if($suggestions->count())
        <table class="table table-bordered table-hover shadow">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suggestions as $index => $suggestion)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $suggestion->name }}</td>
                    <td>{{ $suggestion->email ?? 'N/A' }}</td>
                    <td>{{ $suggestion->message }}</td>
                    <td>{{ $suggestion->created_at->format('d M Y, h:i A') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">No suggestions found.</div>
    @endif
</div>
@endsection
