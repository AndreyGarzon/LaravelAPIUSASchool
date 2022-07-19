<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameOption extends Model
{
    use HasFactory;

    // public function game(){
    //     return $this->belongsTo(Game::class);
    // }
        public function gamegroup(){
        return $this->belongsTo(GameGroup::class);
    }
    public function gameresult(){
        return $this->hasMany(Gameresult::class);
    }


}
