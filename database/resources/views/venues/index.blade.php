@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@extends('layouts.app')

@section('content')
<h1>Venues</h1>

<form method="GET">
    <input type="text" name="search" placeholder="Search by venue name" value="{{ request('search') }}">
    <button type="submit">Search</button>
</form>

<a href="{{ route('venues.create') }}">Create New Venue</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table>
    <tr>
        <th>Name</th>
        <th>Location</th>
        <th>Capacity</th>
        <th>Actions</th>
    </tr>
    @foreach($venues as $venue)
    <tr>
        <td>{{ $venue->name }}</td>
        <td>{{ $venue->location }}</td>
        <td>{{ $venue->capacity }}</td>
        <td>
            <a href="{{ route('venues.edit', $venue->id) }}">Edit</a>

            <form action="{{ route('venues.destroy', $venue->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this venue?')">Delete</button>
            </form>

            @if($venue->deleted_at)
                <a href="{{ route('venues.restore', $venue->id) }}">Restore</a>
            @endif
        </td>
    </tr>
    @endforeach
</table>

{{ $venues->appends(request()->query())->links() }}
@endsection
