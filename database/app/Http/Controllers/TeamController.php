<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Show all teams with pagination and search
    public function index()
    {
        $search = request('search');

        $teams = Team::when($search, function ($q) use ($search) {
            $q->where('name', 'like', "%$search%");
        })->paginate(5);

        return view('teams.index', compact('teams'));
    }

    // Show form to create a new team
    public function create()
    {
        return view('teams.create');
    }

    // Store new team
    public function store(Request $request)
    {
        dd($request->all());

        $request->validate([
            'name' => 'required|min:3',
            'coach' => 'required|string',
        ]);

        Team::create($request->only('name', 'coach'));

        return redirect()->route('teams.index')->with('success', 'Team created successfully');
        
    }

    // Show edit form
    public function edit($id)
    {
        $team = Team::find($id);
        if (!$team) abort(404);

        return view('teams.edit', compact('team'));
    }

    // Update team
    public function update(Request $request, $id)
    {
        dd($team);

        $team = Team::find($id);
        if (!$team) abort(404);

        $request->validate([
            'name' => 'required|min:3',
            'coach' => 'required|string',
        ]);

        $team->update($request->only('name', 'coach'));

        return redirect()->route('teams.index')->with('success', 'Team updated successfully');
    }

    // Soft delete team
    public function destroy($id)
    {
          dd($team); // Inspect the team before deleting
          $team->delete();
        
          $team = Team::find($id);
        if (!$team) abort(404);

        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team deleted successfully');
    }

    // Restore soft-deleted team
    public function restore($id)
    {
        $team = Team::onlyTrashed()->find($id);
        if (!$team) abort(404);

        $team->restore();

        return redirect()->route('teams.index')->with('success', 'Team restored successfully');
    }
    
}
