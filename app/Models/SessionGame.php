<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionGame extends Model
{
    use HasFactory;
    public function statesessiongame(){
        return $this->belongsTo(StateSessionGame::class);
    }
    
    // public function teacher(){
    //     return $this->belongsTo(Teacher::class);
    // }
    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
    
}
