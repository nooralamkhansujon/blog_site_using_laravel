<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;


class Blog extends Model
{
      use SoftDeletes;
      protected $guarded =[];

      public function comments()
      {
          return $this->morphMany('App\Comment', 'commentable');
      }
      public function replies($comment_id){
           $replies = DB::table('replies')
                        ->where([['parent_id',0],['comment_id',$comment_id]])
                        ->orderBy('id','desc')->get();
           return  $replies;
      }


      public function getRouteKeyName()
      {
          return "slug";
      }
}
