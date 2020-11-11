<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    public function anggota(){
        return $this->hasMany('App\Models\Anggota');
    }

    public function posts(){
        return $this->belongsToMany('App\Models\Post');
    }

    public function menus(){
        return $this->belongsToOne('App\Models\Menu');
    }
}
