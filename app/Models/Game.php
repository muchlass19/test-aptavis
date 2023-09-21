<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'home_team',
        'away_team',
        'home_score',
        'away_score',
        'match_date',
        'status'
    ];
    public function homeTeam() {
        return $this->belongsTo(Club::class, 'home_team', 'id');
    }
    public function awayTeam() {
        return $this->belongsTo(Club::class, 'away_team', 'id');
    }
}
