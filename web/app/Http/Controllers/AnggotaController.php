<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;


class AnggotaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu  = "home";

        $anggota = Anggota::orderBy('id','asc')->paginate(50);
        
        $data = array(
            'title'     => 'Kader Kami',
            'menu'      => $menu,
            'anggotas'  => $anggota,    
         );
        return view('pages.anggota')->with($data);
    }    
}
