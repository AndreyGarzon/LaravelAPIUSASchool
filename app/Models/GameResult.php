<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameResult extends Model
{
    use HasFactory;

    protected $fillable =[
        'session_game_id',
        'game_id',
        'game_option_id',
    ];

    public function game(){
        return $this->belongsTo(Game::class);
    }
    public function gameoption(){
        return $this->belongsTo(GameOption::class);
    }
    public function sessiongame(){
        return $this->belongsTo(SessionGame::class);
    }
}
