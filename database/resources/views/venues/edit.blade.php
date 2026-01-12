@extends('layouts.app')

@section('content')
<h1>Edit Venue</h1>

<form action="{{ route('venues.update', $venue->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $venue->name) }}">
    @error('name') <p>{{ $message }}</p> @enderror

    <label>Location</label>
    <input type="text" name="location" value="{{ old('location', $venue->location) }}">
    @error('location') <p>{{ $message }}</p> @enderror

    <label>Capacity</label>
    <input type="number" name="capacity" value="{{ old('capacity', $venue->capacity) }}">
    @error('capacity') <p>{{ $message }}</p> @enderror

    <button type="submit">Update</button>
</form>
@endsection
