<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Headline;

class ReadController extends Controller
{
    public function index()
    {
        $menu  = "news";
        
        $news = Post::with('category')->where('status',1)->orderBy('updated_at','desc')->paginate(15);

        foreach($news as $k => $v){
            $news[$k]['created'] = date('D, d M Y', strtotime($news[$k]['created_at']));
        }
        
        $data = array(
            'title'     => 'Berita',
            'menu'      => $menu,
            'news'      => $news,    
         );
         return response($data);
    }

    public function detail($id)
    {
        $menu  = "news";
        
        $news = Post::find($id);

        $news['created'] = date('D, d M Y', strtotime($news['created_at']));

        $prev = $news->prev();
        $next = $news->next();
        $more = $news->more(3);

        //Get News
        $newest = Post::where('status',1)
        ->where('homepage',1)
        ->where('id','<>',$id)        
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

    public function headline($id)
    {
        $menu  = "news";

        $news = Headline::find($id);
        $prev = $news->prev();
        $next = $news->next();
        $more = $news->more(3);
        //Get News
        $newest = Post::where('status',1)
        ->where('homepage',1)
        ->where('id','<>',$id)        
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

    public function pages($slug){

        $menu = "home";
        $static = Page::where('name',$slug)->first();
        
        $data = array(
            'title'     => $static->title,
            'menu'      => $menu,
            'static'    => $static  
        );
        return response($data);
    }
}
