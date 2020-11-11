<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Alaouy\Youtube\Facades\Youtube;
use App\Models\Post;

class GalleryController extends Controller
{
    public function index()
    {
        $menu  = "foto";

        $news = Gallery::where('publish',1)->orderBy('updated_at','desc')->paginate(15);
        
        $data = array(
            'title'     => 'Foto',
            'menu'      => $menu,
            'photos'    => $news,    
         );
         return response($data);
    }

    public function detail($id)
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
 
        
        $data = array(
            'title'     => $gallery->title,
            'menu'      => $menu,
            'prev'      => $prev,
            'gallery'   => $gallery,    
            'next'      => $next,
            'mores'     => $more,
            'newest'    => $newest
        );
        return response($data);
    }
    
    public function video($id) 
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
 

        $data = array(
            'title'     => $video->snippet->title,
            'menu'      => $menu,
            'video'     => $video,
            'newest'    => $newest
        );
        
        return response($data);
    }

    public function videos() 
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

        // Make intial call. with second argument to reveal page info such as page tokens
        $search = Youtube::searchAdvanced($params, true);

        $data = array(
            'title'     => 'Kumpulan Video',
            'menu'      => $menu,
            'videos'    => $search['results']
        );
        
        return response($data);
    }
}
