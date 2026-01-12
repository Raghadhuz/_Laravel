<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatchGame;

class MatchGameController extends Controller
{

public function index()
{
    $matches = MatchGame::with(['venue', 'teamA', 'teamB'])->get();
    return view('matches.index', compact('matches'));
}

    // List all matches
    public function index1()
    {
        $matches = MatchGame::all();
        return view('matches.index', compact('matches'));
    }

    // Show form to create match
    public function create()
    {
        return view('matches.create');
    }

    // Store new match
    public function store(Request $request)
    {

 $request->validate([ 'name' =>'required|min:3', 'price' =>'required|numeric', 'category_id' =>'required|exists:categories,id', ]);


        $request->validate([
            'venue_id' => 'required|exists:venues,id',
            'team_a_id' => 'required|exists:teams,id',
            'team_b_id' => 'required|exists:teams,id|different:team_a_id',
            'match_date' => 'required|date',
            'match_time' => 'nullable',
            'result' => 'nullable|string'
        ]);

        MatchGame::create($request->all());

        return redirect()->route('matches.index')->with('success', 'Match created successfully!');
    }

    // Show form to edit match
    public function edit($id)
    {
        $match = MatchGame::findOrFail($id);
        return view('matches.edit', compact('match'));
    }

    // Update match
    public function update(Request $request, $id)
    {

 $request->validate([ 'name' =>'required|min:3', 'price' =>'required|numeric', 'category_id' =>'required|exists:categories,id', ]);

        $request->validate([
            'venue_id' => 'required|exists:venues,id',
            'team_a_id' => 'required|exists:teams,id',
            'team_b_id' => 'required|exists:teams,id|different:team_a_id',
            'match_date' => 'required|date',
            'match_time' => 'nullable',
            'result' => 'nullable|string'
        ]);

        $match = MatchGame::findOrFail($id);
        $match->update($request->all());

        return redirect()->route('matches.index')->with('success', 'Match updated successfully!');
    }

    // Delete match
    public function destroy($id)
    {
        $match = MatchGame::findOrFail($id);
        $match->delete();

        return redirect()->route('matches.index')->with('success', 'Match deleted successfully!');
    }

    // Optional: Show single match
    public function show($id)
    {
        $match = MatchGame::findOrFail($id);
        return view('matches.show', compact('match'));
    }
}

