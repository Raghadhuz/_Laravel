<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
  protected $fillable = ['name', 'city', 'capacity'];

    public function matches()
    {
        return $this->hasMany(MatchGame::class);
    }
}

