@extends('layouts.app')

@section('content')
<h1>Create Venue</h1>

<form action="{{ route('venues.store') }}" method="POST">
    @csrf

    <label>Name</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name') <p>{{ $message }}</p> @enderror

    <label>Location</label>
    <input type="text" name="location" value="{{ old('location') }}">
    @error('location') <p>{{ $message }}</p> @enderror

    <label>Capacity</label>
    <input type="number" name="capacity" value="{{ old('capacity') }}">
    @error('capacity') <p>{{ $message }}</p> @enderror

    <button type="submit">Save</button>
</form>
@endsection
