<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MatchGame extends Model
{
    use SoftDeletes;

    protected $fillable = ['match_date', 'venue_id', 'team_a_id', 'team_b_id'];

    // Relationships
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function teamA()
    {
        return $this->belongsTo(Team::class, 'team_a_id');
    }

    public function teamB()
    {
        return $this->belongsTo(Team::class, 'team_b_id');
    }
}
