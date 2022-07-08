<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameResult extends Model
{
    use HasFactory;

    public function school(){
        return $this->belongsTo(School::class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function game(){
        return $this->belongsTo(Game::class);
    }
    public function gameOption(){
        return $this->belongsTo(GameOption::class);
    }
}
