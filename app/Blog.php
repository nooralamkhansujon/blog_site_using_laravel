<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
      use SoftDeletes;
      protected $guarded =[];

      public function comments()
      {
          return $this->morphMany('App\Comment', 'commentable');
      }


      public function getRouteKeyName()
      {
          return "slug";
      }
}
