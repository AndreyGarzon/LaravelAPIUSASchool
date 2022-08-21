<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable =[
        'group_name',
        'teacher_id'
    ];

    public function student(){
        return $this->hasMany(Student::class);
    }
    
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    
}
