<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Press extends Model
{
    protected $table = 'press_releases';

    // in your model file
    public function next(){
        // get next user
        return Press::where('id', '>', $this->id)->orderBy('id','asc')->first(['id','title','created_at']);

    }
    public  function prev(){
        // get previous  user
        return Press::where('id', '<', $this->id)->orderBy('id','desc')->first(['id','title','created_at']);
    }

    public function more($limit){
        return Press::where('id', '<>', $this->id)->orderBy('id','desc')
        ->select(['id','title','created_at','image'])
        ->limit($limit)
        ->get(); 
    }
}
