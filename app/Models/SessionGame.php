<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionGame extends Model
{
    use HasFactory;
    protected $fillable =[
        'state_session_game_id',
        'student_id',
        'game_group_id'
    ];

    public function statesessiongame(){
        return $this->belongsTo(StateSessionGame::class);
    }
    

    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function gamegroup(){
        return $this->belongsTo(GameGroup::class);
    }
    
}
