<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Reply extends Model
{
    protected $guarded =[];
    protected $table = 'replies';

    public function comment(){
        return $this->belongsTo(Comment::class,'comment_id','id');
    }

    public function childrens(){
        return $this->hasMany('App\Reply','parent_id','id');
    }


}
