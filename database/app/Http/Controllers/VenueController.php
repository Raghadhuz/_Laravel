<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function index()
    {
        $search = request('search');

        $venues = Venue::when($search, fn($q) => $q->where('name','like',"%$search%"))
                       ->paginate(5);

        return view('venues.index', compact('venues'));
    }

    public function create()
    {
        return view('venues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'location' => 'required|string',
            'capacity' => 'required|numeric|min:1',
        ]);

        Venue::create($request->only('name','location','capacity'));

        return redirect()->route('venues.index')->with('success', 'Venue created successfully');
    }

    public function edit($id)
    {
        $venue = Venue::find($id);
        if (!$venue) abort(404);

        return view('venues.edit', compact('venue'));
    }

    public function update(Request $request, $id)
    {
        $venue = Venue::find($id);
        if (!$venue) abort(404);

        $request->validate([
            'name' => 'required|string|min:3',
            'location' => 'required|string',
            'capacity' => 'required|numeric|min:1',
        ]);

        $venue->update($request->only('name','location','capacity'));

        return redirect()->route('venues.index')->with('success', 'Venue updated successfully');
    }

    public function destroy($id)
    {
        $venue = Venue::find($id);
        if (!$venue) abort(404);

        $venue->delete();

        return redirect()->route('venues.index')->with('success', 'Venue deleted successfully');
    }

    public function restore($id)
    {
        $venue = Venue::onlyTrashed()->find($id);
        if (!$venue) abort(404);

        $venue->restore();

        return redirect()->route('venues.index')->with('success', 'Venue restored successfully');
    }
}
