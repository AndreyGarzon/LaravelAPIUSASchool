<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    use HasFactory;
    protected $fillable =[
        'first_name',
        'code',
        'group_id'
    ];
    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function sessiongame(){
        return $this->hasMany(SessionGame::class);
    }
    
}
