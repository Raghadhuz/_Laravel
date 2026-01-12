@extends('layouts.admin') <!-- or admin template layout -->

@section('content')
<div class="container">
    <h2>Create New Match</h2>

    <form action="{{ route('matches.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="venue_id">Venue:</label>
            <select name="venue_id" id="venue_id" class="form-control">
                @foreach($venues as $venue)
                    <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="team_a_id">Team A:</label>
            <select name="team_a_id" id="team_a_id" class="form-control">
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="team_b_id">Team B:</label>
            <select name="team_b_id" id="team_b_id" class="form-control">
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="match_date">Match Date:</label>
            <input type="date" name="match_date" id="match_date" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-2">Save Match</button>
    </form>
</div>
@endsection
