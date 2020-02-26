<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Project extends Model
{
    use SoftDeletes;
    protected $guarded =[];

    public function getProjectTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function replies(){
        $replies = DB::table('replies')->where([['parent_id',0],['comment_id',$this->id]])->orderBy('id','desc')->get();
        return  $replies;
    }

}
