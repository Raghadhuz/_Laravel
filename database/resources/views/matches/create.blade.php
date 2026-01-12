@extends('layouts.app')

@section('content')
<h1>Create Match</h1>

<form action="{{ route('matches.store') }}" method="POST">
    @csrf

    <label>Match Date</label>
    <input type="date" name="match_date" value="{{ old('match_date') }}">
    @error('match_date') <p>{{ $message }}</p> @enderror

    <label>Venue</label>
    <select name="venue_id">
        @foreach($venues as $venue)
            <option value="{{ $venue->id }}" {{ old('venue_id') == $venue->id ? 'selected' : '' }}>
                {{ $venue->name }}
            </option>
        @endforeach
    </select>
    @error('venue_id') <p>{{ $message }}</p> @enderror

    <label>Team A</label>
    <select name="team_a_id">
        @foreach($teams as $team)
            <option value="{{ $team->id }}" {{ old('team_a_id') == $team->id ? 'selected' : '' }}>
                {{ $team->name }}
            </option>
        @endforeach
    </select>
    @error('team_a_id') <p>{{ $message }}</p> @enderror

    <label>Team B</label>
    <select name="team_b_id">
        @foreach($teams as $team)
            <option value="{{ $team->id }}" {{ old('team_b_id') == $team->id ? 'selected' : '' }}>
                {{ $team->name }}
            </option>
        @endforeach
    </select>
    @error('team_b_id') <p>{{ $message }}</p> @enderror

    <button type="submit">Save</button>
</form>
@endsection
