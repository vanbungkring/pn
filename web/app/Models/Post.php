<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function dpd() {
        return $this->belongsToMany('App\Models\Daerah');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /*public function author()
    {
        return $this->belongsTo('');
    }*/

    // in your model file
    public function next(){
        // get next user
        return Post::where('id', '>', $this->id)->orderBy('id','asc')->first(['id','title','created_at']);

    }
    public  function prev(){
        // get previous  user
        return Post::where('id', '<', $this->id)->orderBy('id','desc')->first(['id','title','created_at']);
    }

    public function more($limit){
        return Post::where('id', '<>', $this->id)->orderBy('id','desc')
        ->select(['id','title','created_at','feature_image'])
        ->limit($limit)
        ->get(); 
    }

    /**
     * Get all of the tags for the post.
     */
     public function tags()
     {
         return $this->morphToMany('App\Models\Tag', 'taggable');
     }
}
