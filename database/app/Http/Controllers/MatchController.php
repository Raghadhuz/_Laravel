<?php

namespace App\Http\Controllers;

use App\Models\MatchGame;
use App\Models\Venue;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $search = request('search');

        $matches = MatchGame::with(['venue', 'teamA', 'teamB'])
            ->when($search, function ($q) use ($search) {
                $q->whereHas('teamA', fn($q2) => $q2->where('name', 'like', "%$search%"))
                  ->orWhereHas('teamB', fn($q2) => $q2->where('name', 'like', "%$search%"));
            })
            ->paginate(5);

        return view('matches.index', compact('matches'));
    }

    public function create()
    {
        $teams = Team::all();
        $venues = Venue::all();

        return view('matches.create', compact('teams', 'venues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'match_date' => 'required|date',
            'venue_id' => 'required|exists:venues,id',
            'team_a_id' => 'required|exists:teams,id|different:team_b_id',
            'team_b_id' => 'required|exists:teams,id|different:team_a_id',
        ]);

        MatchGame::create($request->only('match_date','venue_id','team_a_id','team_b_id'));

        return redirect()->route('matches.index')->with('success', 'Match created successfully');
    }

    public function edit($id)
    {
        $match = MatchGame::find($id);
        if (!$match) abort(404);

        $teams = Team::all();
        $venues = Venue::all();

        return view('matches.edit', compact('match', 'teams', 'venues'));
    }

    public function update(Request $request, $id)
    {
        $match = MatchGame::find($id);
        if (!$match) abort(404);

        $request->validate([
            'match_date' => 'required|date',
            'venue_id' => 'required|exists:venues,id',
            'team_a_id' => 'required|exists:teams,id|different:team_b_id',
            'team_b_id' => 'required|exists:teams,id|different:team_a_id',
        ]);

        $match->update($request->only('match_date','venue_id','team_a_id','team_b_id'));

        return redirect()->route('matches.index')->with('success', 'Match updated successfully');
    }

    public function destroy($id)
    {
        $match = MatchGame::find($id);
        if (!$match) abort(404);

        $match->delete();

        return redirect()->route('matches.index')->with('success', 'Match deleted successfully');
    }

    public function restore($id)
    {
        $match = MatchGame::onlyTrashed()->find($id);
        if (!$match) abort(404);

        $match->restore();

        return redirect()->route('matches.index')->with('success', 'Match restored successfully');
    }
}
