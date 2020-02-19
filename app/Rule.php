<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Rule extends Model
{

    protected $guarded =[];

    public function users(){
        return $this->hasMany(User::class,'role_id','id');
    }
}
