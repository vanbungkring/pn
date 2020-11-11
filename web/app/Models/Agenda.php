<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    public function dpd() {
        return $this->belongsTo('App\Models\Daerah','daerah_id');
    }

    // in your model file
    public function next(){
        // get next user
        return Agenda::where('id', '>', $this->id)->orderBy('id','asc')->first(['id','name','created_at']);

    }
    public  function prev(){
        // get previous  user
        return Agenda::where('id', '<', $this->id)->orderBy('id','desc')->first(['id','name','created_at']);
    }

    public function more($limit){
        return Agenda::where('id', '<>', $this->id)->orderBy('id','desc')
        ->select(['id','name','created_at','poster'])
        ->limit($limit)
        ->get(); 
    }
}
