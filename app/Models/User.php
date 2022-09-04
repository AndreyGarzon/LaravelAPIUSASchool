<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     
    public function sendPasswordResetNotification($token)
    {

        $url = 'http://ec2-3-20-240-131.us-east-2.compute.amazonaws.com/auth/reset-password?token=' . $token;

        $this->notify(new ResetPasswordNotification($url));
    }

    public function teacher(){
        return $this->hasOne(Teacher::class);
    }

    
    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function group(){
        return $this->hasManyThrough(Group::class,Teacher::class,'user_id','teacher_id','id','id');
    }

    


    

}
