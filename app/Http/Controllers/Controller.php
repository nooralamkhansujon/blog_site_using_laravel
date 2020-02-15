<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\Facades\Image;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setSuccess($message){
       session()->flash('message',$message);
       session()->flash('type','success');
    }
    public function setError($message){
        session()->flash('message',$message);
        session()->flash('type','danger');
    }

    public function  thumbnail($file,$file_prefix,$folder,$width,$height){
        $image           = $file->getClientOriginalName();
        $image_extension = $file->getClientOriginalExtension();
        //make random image name for image
        $new_image       = $file_prefix.'_'.uniqid().'.'.$image_extension;
        //store image in storage/app/public then given folder
        $path            = $file->storeAs($folder,$new_image,'public');
        $image           = Image::make(public_path('storage/'.$path))->fit($width,$height);
        $image->save();
        return $path;///it return image like folder/file_prefix_5e47f08be439c.jpg
    }
}
