@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@extends('layouts.app')

@section('content')
<h1>Matches</h1>

<form method="GET">
    <input type="text" name="search" placeholder="Search by team name" value="{{ request('search') }}">
    <button type="submit">Search</button>
</form>

<a href="{{ route('matches.create') }}">Create New Match</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table>
    <tr>
        <th>Date</th>
        <th>Venue</th>
        <th>Team A</th>
        <th>Team B</th>
        <th>Actions</th>
    </tr>
    @foreach($matches as $match)
    <tr>
        <td>{{ $match->match_date }}</td>
        <td>{{ $match->venue->name }}</td>
        <td>{{ $match->teamA->name }}</td>
        <td>{{ $match->teamB->name }}</td>
        <td>
            <a href="{{ route('matches.edit', $match->id) }}">Edit</a>

            <form action="{{ route('matches.destroy', $match->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this match?')">Delete</button>
            </form>

            @if($match->deleted_at)
                <a href="{{ route('matches.restore', $match->id) }}">Restore</a>
            @endif
        </td>
    </tr>
    @endforeach
</table>

{{ $matches->appends(request()->query())->links() }}
@endsection
