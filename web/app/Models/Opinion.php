<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $table = 'opinion';

    public function anggota(){
        return $this->belongsTo('App\Models\Anggota')->withDefault();
    }

    // in your model file
    public function next(){
        // get next user
        return Opinion::where('id', '>', $this->id)->orderBy('id','asc')->first(['id','title','created_at']);

    }
    public  function prev(){
        // get previous  user
        return Opinion::where('id', '<', $this->id)->orderBy('id','desc')->first(['id','title','created_at']);

    }

    public function more($limit){
        return Opinion::where('id', '<>', $this->id)->orderBy('id','desc')
        ->select(['id','title','created_at','photo'])
        ->limit($limit)
        ->get(); 
    }
}
