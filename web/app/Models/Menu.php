<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //use ModelTree, AdminBuilder;

    protected $table = 'menus';

    public function dpd() {
        return $this->belongsTo('App\Models\Daerah','id');
    }    
}
