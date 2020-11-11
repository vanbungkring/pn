<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Press;
use App\Models\Post;

class PressController extends Controller
{
    public function index()
    {
        $menu  = "press";

        $news = Press::where('publish',1)->orderBy('updated_at','desc')->paginate(1);
        
        $data = array(
            'title'     => 'Press Release',
            'menu'      => $menu,
            'news'      => $news,    
         );
         return response($data);
    }

    public function detail($id)
    {
        $menu  = "press";

        $news = Press::find($id);
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
            'title'     => $news->title,
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
