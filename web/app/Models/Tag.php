<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    public $fillable = array('name');
    public $timestamps = false;
    
    public function posts()
    {
        return $this->morphedByMany('App\Models\Post', 'taggable')
        ->limit(6)
        ->orderBy('created_at','desc');
    }

    public function allPost() {
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }
}    