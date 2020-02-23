<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Subscribe;
use App\Rule;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;
    protected $guarded =[];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subscribe(){
         return $this->hasMany(Subscribe::class,'user_id','id');
    }

    public function isAdmin(){
        return $this->role_id == 2;
    }

    public function isUser(){
        return $this->role_id == 1;
    }

    public function isSubscribe(){
        $subscribe = Subscribe::where('user_id',$this->id)->get();
        return count($subscribe) > 0;
    }

    public function Rule(){
          return $this->belongsTo(Rule::class,'role_id','id');
    }
}
