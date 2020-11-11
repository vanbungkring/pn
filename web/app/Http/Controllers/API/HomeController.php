<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Headline;
use App\Models\Post;
use App\Models\Opinion;
use App\Models\Agenda;
use App\Models\Press;
use App\Models\Page;
use App\Models\Gallery;
use Alaouy\Youtube\Facades\Youtube;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $menu = "home";
 
         //Get HEadline    
         $headlines= Headline::where('publish',1)
         ->select('id','title','excerpt','created_at','image','uri')
         ->limit(4)
         ->orderBy('order')
         ->get();
         
         //Get News
         $news = Post::where('status',1)
         ->where('homepage',1)        
         ->select('id','title','excerpt','created_at','feature_image')
         ->limit(6)
         ->orderBy('updated_at','desc')
         ->get();
 
         //Get Opini    
         $opinions = Opinion::where('status',1)
         ->select('id','title','excerpt','created_at','photo','anggota_id')
         ->limit(3)
         ->orderBy('updated_at','desc')
         ->get();
 
         //Get Agenda
         $agendas = Agenda::where('end_date','>=', now())
         ->limit(3)
         ->orderBy('start_date')
         ->get();
 
         //Get Press release
         $press = Press::where('publish',1)
         ->limit(3)
         ->orderBy('updated_at','desc')
         ->get();
 
         $dpd_news = Post::where('status',1)
         ->where('homepage_daerah',1)
         ->whereHas('dpd',function($q) {
             $q->where('daerahs.id', '>', 1);
         })
         ->select('id','title','excerpt','created_at','feature_image')
         ->limit(6)
         ->orderBy('updated_at','desc')
         ->get();
 
         //galerry
         $galleries = Gallery::where('publish',1)
         ->limit(8)
         ->orderBy('updated_at','desc')
         ->get();
 
         //Pages
         $pages  = Page::limit(3)
         ->orderBy('id')
         ->get();
         
         // Set default parameters
         $params = array(
             'channelId'    => 'UCl69eCjpUj-JwCjGLpzR6kw',
             'type'          => 'video',
             'part'          => 'id, snippet',
             'order'         => 'date',
             'maxResults'    => 8
         );
 
         $search = Youtube::searchAdvanced($params, true);
         //dd($search);
         $data = array(
             'title'     => 'Home Page',
             'menu'      => $menu,
             'headlines' => $headlines,
             'news'      => $news,    
             'opinis'    => $opinions,
             'agendas'   => $agendas,
             'press'     => $press,
             'dpdnews'   => $dpd_news,
             'galleries' => $galleries,
             'pages'     => $pages,
             'youtubes'  => $search['results']
         );
 
         return response($data);
     }
}
