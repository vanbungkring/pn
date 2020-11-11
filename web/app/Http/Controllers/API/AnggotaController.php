<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index(){
        $menu  = "home";
        
        $anggota = Anggota::orderBy('id','asc')->paginate(15);
        
        $data = array(
            'title'     => 'Kader Kami',
            'menu'      => $menu,
            'anggotas'  => $anggota,    
            );
        
        return response($data);
    }
}
