@extends('layouts.admin') <!-- your admin layout -->

<form method="GET" action="{{ route('products.index') }}">
    <input type="text" name="search" placeholder="Search by name" value="{{ request('search') }}">
    <button type="submit">Search</button>
</form>


@section('content')
<div class="container">
    <h2>Matches List</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Match Date</th>
                <th>Venue</th>
                <th>Team A</th>
                <th>Team B</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matches as $match)
                <tr>
                    <td>{{ $match->match_date }}</td>
                    <td>{{ $match->venue->name }}</td>
                    <td>{{ $match->teamA->name }}</td>
                    <td>{{ $match->teamB->name }}</td>
                    <td>
                        <a href="{{ route('matches.edit', $match->id) }}" class="btn btn-sm btn-primary">
                            Edit
                        </a>

                        <form action="{{ route('matches.destroy', $match->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}

</div>
@endsection
