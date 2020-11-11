<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Post;

class AgendaController extends Controller
{
    public function index(){
        $menu  = "agenda";
        
        $news = Agenda::orderBy('end_date','desc')->paginate(9);
        
        $data = array(
            'title'     => 'Agenda',
            'menu'      => $menu,
            'agendas'    => $news,    
            );
        return response($data);
    }

    public function detail($id){
        $menu  = "agenda";
        
        $news = Agenda::find($id);
        $prev = $news->prev();
        $next = $news->next();
        $more = $news->more(3);

            //Get News
            $newest = Post::where('status',1)
            ->where('homepage',1)
            ->select('id','title','excerpt','created_at','feature_image')
            ->limit(2)
            ->orderBy('updated_at','desc')
            ->get();
    
        
        $data = array(
            'title'     => $news->name,
            'menu'      => $menu,
            'prev'      => $prev,
            'news'      => $news,    
            'next'      => $next,
            'mores'     => $more,
            'newest'    => $newest
        );
        return response($data);
    }
}
