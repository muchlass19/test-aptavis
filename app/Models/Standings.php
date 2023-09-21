<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standings extends Model
{
    use HasFactory;
    protected $fillable = [
        'club_id',
        'play',
        'point',
        'win',
        'draw',
        'lose',
        'goal_win',
        'goal_lose'
    ];
    public function clubs() {
        return $this->belongsTo(Club::class, 'club_id', 'id');
    }
}
