<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // public function gameoption(){
    //     return $this->hasMany(GameOption::class);
    // }
    public function gamegroup(){
        return $this->belongsTo(GameGroup::class);
    }
    
}
