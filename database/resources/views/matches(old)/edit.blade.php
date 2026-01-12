<h1>Edit Match</h1>

<form action="{{ route('matches.update', $match->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Venue ID:</label>
    <input type="number" name="venue_id" value="{{ $match->venue_id }}" required>
    <label>Team A ID:</label>
    <input type="number" name="team_a_id" value="{{ $match->team_a_id }}" required>
    <label>Team B ID:</label>
    <input type="number" name="team_b_id" value="{{ $match->team_b_id }}" required>
    <label>Match Date:</label>
    <input type="date" name="match_date" value="{{ $match->match_date }}" required>
    <label>Match Time:</label>
    <input type="time" name="match_time" value="{{ $match->match_time }}">
    <label>Result:</label>
    <input type="text" name="result" value="{{ $match->result }}">
    <button type="submit">Update</button>
</form>
