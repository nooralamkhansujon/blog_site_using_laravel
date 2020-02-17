<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    protected $guarded =[];

    public function getProjectTitleAttribute($value)
    {
        return ucfirst($value);
    }

    // public function getProjectDescriptionAttribute($value){
    //     return substr($value,0,50)."...";
    // }
    // public function getCreatedAtAttribute($value){
    //     return $value;
    // }
}
