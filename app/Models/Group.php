<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function student(){
        return $this->hasMany(Student::class);
    }
    public function gameoption(){
        return $this->hasMany(GameOption::class);
    }
    public function group(){
        return $this->hasMany(School::class);
    }
    
}
