<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $guarded =[];


    public function comment()
    {
        return $this->hasOne(\App\Comment::class,'parent_id','id');
    }

}
