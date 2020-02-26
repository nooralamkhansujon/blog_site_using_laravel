<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Reply;

class Comment extends Model
{
    use SoftDeletes;
    protected $guarded =[];


    public function commentable(){
        return $this->morphTo();
    }

}
