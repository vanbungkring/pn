<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Alaouy\Youtube\Facades\Youtube;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
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
        $menu  = "foto";

        $news = Gallery::where('publish',1)->orderBy('updated_at','desc')->paginate(15);
        
        $data = array(
            'title'     => 'Foto',
            'menu'      => $menu,
            'photos'    => $news,    
         );
        return view('pages.list.gallery')->with($data);
    }

    public function detail($id, Request $request)
    {
        $menu  = "foto";

        $gallery = Gallery::find($id);
        $prev = $gallery->prev();
        $next = $gallery->next();
        $more = $gallery->more(3);

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
        
        $data = array(
            'title'     => $gallery->title,
            'meta_des'  => $gallery->content,
            'meta_image'=> asset('storage/'. $gallery->main_image),
            'menu'      => $menu,
            'prev'      => $prev,
            'gallery'   => $gallery,    
            'next'      => $next,
            'mores'     => $more,
            'newest'    => $newest,
            'views'     => $pv 
        );
        return view('pages.gallery')->with($data);
    }
    
    public function video($id, Request $request) 
    {
        $menu  = "video";
        
        $video = Youtube::getVideoInfo($id);

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

         $data = array(
            'title'     => $video->snippet->title,
            'meta_des'  => $video->snippet->description,
            'meta_image'=> $video->snippet->thumbnails->medium->url,
            'menu'      => $menu,
            'video'     => $video,
            'newest'    => $newest,
            'views'     => $pv 
        );
        
        return view('pages.video')->with($data);
    }

    public function videos(Request $request) 
    {
        $menu  = "video";
        
        // Set default parameters
        $params = array(
            'channelId'    => 'UCl69eCjpUj-JwCjGLpzR6kw',
            'type'          => 'video',
            'part'          => 'id, snippet',
            'order'         => 'date',
            'maxResults'    => 15
        );

        if ($a = $request->all()){
            $params['pageToken'] = $a['page'];
        }

        // Make intial call. with second argument to reveal page info such as page tokens
        $search = Youtube::searchAdvanced($params, true);

        $data = array(
            'title'     => 'Kumpulan Video',
            'menu'      => $menu,
            'videos'    => $search['results'],
            'prev'      => $search['info']['prevPageToken'],
            'next'      => $search['info']['nextPageToken'],
        );
        
        return view('pages.list.video')->with($data);
    }
    
}
