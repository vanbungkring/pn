<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Headline extends Model
{
    use ModelTree, AdminBuilder;
    
    protected $table = 'headlines';

    // in your model file
    public function next(){
        // get next user
        return Headline::where('id', '>', $this->id)->orderBy('id','asc')->first(['id','title','created_at']);

    }
    public  function prev(){
        // get previous  user
        return Headline::where('id', '<', $this->id)->orderBy('id','desc')->first(['id','title','created_at']);
    }

    public function more($limit){
        return Headline::where('id', '<>', $this->id)->orderBy('order')
        ->select(['id','title','created_at','image'])
        ->limit($limit)
        ->get(); 
    }
}
