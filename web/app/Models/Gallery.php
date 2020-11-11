<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    
    public function setImagesAttribute($pictures)
    {   
        if (is_array($pictures)) {
            $this->attributes['images'] = json_encode($pictures);
        }
    }
    
    public function getImagesAttribute($pictures)
    {
        return json_decode($pictures, true);
    }

    // in your model file
    public function next(){
        // get next user
        return Gallery::where('id', '>', $this->id)
        ->where('publish',1)
        ->orderBy('id','asc')->first(['id','title','created_at']);

    }
    public  function prev(){
        // get previous  user
        return Gallery::where('id', '<', $this->id)
        ->where('publish',1)        
        ->orderBy('id','desc')->first(['id','title','created_at']);
    }

    public function more($limit){
        return Gallery::where('id', '<>', $this->id)
        ->where('publish',1)        
        ->orderBy('id','desc')
        ->select(['id','title','created_at','main_image'])
        ->limit($limit)
        ->get(); 
    }
}
