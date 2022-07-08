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

    public function gameoption(){
        return $this->hasMany(GameOption::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }

}
