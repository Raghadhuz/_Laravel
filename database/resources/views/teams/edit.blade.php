@extends('layouts.app')

@section('content')
<h1>Edit Team</h1>

<form action="{{ route('teams.update', $team->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $team->name) }}">
    @error('name') <p>{{ $message }}</p> @enderror

    <label>Coach</label>
    <input type="text" name="coach" value="{{ old('coach', $team->coach) }}">
    @error('coach') <p>{{ $message }}</p> @enderror

    <button type="submit">Update</button>
</form>
@endsection
