<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateSessionGame extends Model
{
    use HasFactory;
    public function sessiongame(){
        return $this->hasMany(SessionGame::class);
    }
}
