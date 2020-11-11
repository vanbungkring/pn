<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinion;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class OpiniController extends Controller
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
        $menu  = "opini";

        $news = Opinion::where('status',1)->orderBy('updated_at','desc')->paginate(15);
        
        $data = array(
            'title'     => 'Opini',
            'menu'      => $menu,
            'news'      => $news,    
         );
        return view('pages.list')->with($data);
    }

    public function detail($id, Request $request)
    {
        $menu  = "opini";

        $news = Opinion::find($id);
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

        //Get page view
        $path = $request->path();
        $pageViews = DB::table('tracker_paths')
        ->join('tracker_log', 'tracker_paths.id', '=', 'tracker_log.path_id')
        ->select('*')
        ->where('tracker_paths.path', $path)
        ->get();
        $pv = count($pageViews); 
         
        if(substr($news->photo,0,4) == "http" )
            $meta_img = $news->photo;
        else
            $meta_img = asset('storage/'.$news->photo);
 
        $data = array(
            'title'     => $news->title,
            'meta_des'  => $news->excerpt,
            'meta_image'=> $meta_img, 
            'menu'      => $menu,
            'prev'      => $prev,
            'news'      => $news,    
            'next'      => $next,
            'mores'     => $more ,
            'newest'    => $newest,
            'views'     => $pv 
        );
        return view('pages.opini')->with($data);
    }    
    
}
