<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcomingMatch extends Model
{
    protected $fillable = ['stadium', 'date', 'first_team_id', 'second_team_id', 'active'];

    public function firstTeam(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class, 'first_team_id');
    }

    public function secondTeam(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class, 'second_team_id');
    }
}
