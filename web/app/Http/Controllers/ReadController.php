<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Headline;
use App\Models\Page;
use App\Models\Tag;
use App\Models\Daerah;
use Tracker;
use Illuminate\Support\Facades\DB;

class ReadController extends Controller
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
    public function index($daerah='')
    {
        $menu  = "news";
	
	if ($daerah == '') {
        	$news = Post::where('status',1)->orderBy('id','desc')->paginate(15);
	} else {
		 $daerah = Daerah::where('name',$daerah)->first();
        
		if (!$daerah) {
		    abort(404);
		}

		//Get News
		$news = Post::where('status',1)
		->whereHas('dpd',function($q) use ($daerah) {
		    $q->where('daerahs.id', '=', $daerah->id);
		})
		->orderBy('updated_at','desc')
		->paginate(15);

	}
        
        $data = array(
            'title'     => 'Berita',
            'menu'      => $menu,
            'news'      => $news,    
         );
        return view('pages.berita')->with($data);
    }

    public function detail($id, Request $request)
    {
        $menu  = "news";
        
        $news = Post::find($id);
        $prev = $news->prev();
        $next = $news->next();
        $more = $news->more(3,$news->category_id);

        //Get News
        $newest = Post::where('status',1)
        ->where('homepage',1)
        ->where('id','<>',$id)        
        ->select('id','title','excerpt','created_at','feature_image')
        ->limit(2)
        ->orderBy('created_at','desc')
        ->get();
        //Get page view
	$created = str_replace('-','/',substr($news->created_at,0,10));
        $path = $request->path();
        $pageViews = DB::table('tracker_paths')
        ->join('tracker_log', 'tracker_paths.id', '=', 'tracker_log.path_id')
        ->where('tracker_paths.path','like', '%/' .$id. '/' .$created. '%')
        ->count();
        $pv = $pageViews;
        
        if(substr($news->feature_image,0,4) == "http" )
            $meta_img = $news->feature_image;
        else
            $meta_img = asset('storage/'.$news->feature_image);
        
        $data = array(
            'title'     => $news->title,
            'meta_des'  => $news->excerpt,
            'meta_image'=> $meta_img,
            'menu'      => $menu,
            'prev'      => $prev,
            'news'      => $news,    
            'next'      => $next,
            'mores'     => $more,
            'newest'    => $newest,
            'views'     => $pv  
        );
        return view('pages.read')->with($data);
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
        ->orderBy('created_at','desc')
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
        return view('pages.headline')->with($data);
    }

    public function pages($slug){

        $menu = "home";
        $static = Page::where('name',$slug)->first();
        
        $data = array(
            'title'     => $static->title,
            'menu'      => $menu,
            'static'    => $static  
        );
        return view('pages.static')->with($data);
    }

    public function tags($tag) {    
        $menu  = "news";
        $news = Post::where('status',1)
        ->whereHas('tags',function($query) use ($tag) {
            $query->where('name',$tag);
        })
        ->orderBy('id','desc')->paginate(15);
        
        $data = array(
            'title'     => 'Berita',
            'menu'      => $menu,
            'news'      => $news,    
            );
        return view('pages.berita')->with($data);
    }
    
}
