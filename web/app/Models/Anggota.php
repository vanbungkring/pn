<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    public function daerah(){
        return $this->belongsTo('App\Models\Daerah');
    }

}
