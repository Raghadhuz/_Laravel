<h1>Match Details</h1>

<p><strong>ID:</strong> {{ $match->id }}</p>
<p><strong>Venue:</strong> {{ $match->venue->name }}</p>
<p><strong>Team A:</strong> {{ $match->teamA->name }}</p>
<p><strong>Team B:</strong> {{ $match->teamB->name }}</p>
<p><strong>Date:</strong> {{ $match->match_date }}</p>
<p><strong>Time:</strong> {{ $match->match_time ?? 'Not set' }}</p>
<p><strong>Result:</strong> {{ $match->result ?? 'Not decided yet' }}</p>

<a href="{{ route('matches.index') }}">Back to Matches List</a>
<a href="{{ route('matches.edit', $match->id) }}">Edit Match</a>

<form action="{{ route('matches.destroy', $match->id) }}" method="POST" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Match</button>
</form>
