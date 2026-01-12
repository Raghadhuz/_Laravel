@extends('layouts.app')

@section('content')
<h1>Create Team</h1>

<form action="{{ route('teams.store') }}" method="POST">
    @csrf
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name') <p>{{ $message }}</p> @enderror

    <label>Coach</label>
    <input type="text" name="coach" value="{{ old('coach') }}">
    @error('coach') <p>{{ $message }}</p> @enderror

    <button type="submit">Save</button>
</form>
@endsection
