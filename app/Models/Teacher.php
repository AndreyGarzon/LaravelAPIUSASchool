<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);

    }

    public function gameresult(){
        return $this->hasMany(GameResult::class);
    }

    public function group(){
        return $this->hasMany(Group::class);
    }

    // public function sessiongame(){
    //     return $this->hasMany(SessionGame::class);
    // }






}
