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
    public function school(){
        return $this->belongsTo(School::class);


    }

    public function gameResult(){
        return $this->hasMany(GameResult::class);
    }

    public function group(){
        return $this->hasMany(Group::class);
    }






}
