<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    public function teacher(){
        return $this->hasMany(Teacher::class);
    }

    public function gameresults(){
        return $this->hasMany(GameResults::class);
    }
    public function group(){
        return $this->hasMany(Group::class);
    }

}
