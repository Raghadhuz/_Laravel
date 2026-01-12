@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@extends('layouts.app')

@section('content')
<h1>Teams</h1>

<form method="GET">
    <input type="text" name="search" placeholder="Search by team name" value="{{ request('search') }}">
    <button type="submit">Search</button>
</form>

<a href="{{ route('teams.create') }}">Create New Team</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table>
    <tr>
        <th>Name</th>
        <th>Coach</th>
        <th>Actions</th>
    </tr>
    @foreach($teams as $team)
    <tr>
        <td>{{ $team->name }}</td>
        <td>{{ $team->coach }}</td>
        <td>
            <a href="{{ route('teams.edit', $team->id) }}">Edit</a>

            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this team?')">Delete</button>
            </form>

            @if($team->deleted_at)
                <a href="{{ route('teams.restore', $team->id) }}">Restore</a>
            @endif
        </td>
    </tr>
    @endforeach
</table>

{{ $teams->appends(request()->query())->links() }}
@endsection
