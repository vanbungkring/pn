<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Headline;
use App\Models\Post;
use App\Models\Opinion;
use App\Models\Covid;
use App\Models\Agenda;
use App\Models\Press;
use App\Models\Page;
use App\Models\Gallery;
use App\Models\Banner;
use App\Models\Tag;
use Alaouy\Youtube\Facades\Youtube;
use App\Models\settings;

class HomeController extends Controller
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
        ->orderBy('id','desc')
        ->orderBy('created_at','desc')
        ->get();

        //Get Opini    
        $opinions = Opinion::where('status',1)
        ->select('id','title','excerpt','created_at','photo','anggota_id')
        ->limit(3)
        ->orderBy('created_at','desc')
        ->get();

         //Get Covid   
        /* $covids = Covid::where('status',1)
        ->select('id','title','excerpt','created_at','photo','anggota_id')
        ->limit(3)
        ->orderBy('created_at','desc')
        ->get(); */

        $covid = Post::where('status',1)
        ->where('homepage',1)        
        ->select('id','title','excerpt','created_at','feature_image')
        ->limit(6)
        ->orderBy('id','desc')
        ->orderBy('created_at','desc')
        ->get();

        //Get Agenda
        $agendas = Agenda::where('end_date','>=', now())
        ->limit(3)
        ->orderBy('start_date')
        ->get();

        //Get Press release
        $press = Press::where('publish',1)
        ->limit(6)
        ->orderBy('created_at','desc')
        ->get();
        
        $dpd_news = Post::where('status',1)
        ->where('homepage_daerah',1)
        ->whereHas('dpd',function($q) {
            $q->where('daerahs.id', '>', 1);
        })
        ->select('id','title','excerpt','created_at','feature_image')
        ->limit(6)
        ->orderBy('created_at','desc')
        ->get();

        //galerry
        $galleries = Gallery::where('publish',1)
        ->limit(8)
        ->orderBy('created_at','desc')
        ->get();

        //Pages
        $pages  = Page::limit(2)
        ->orderBy('id')
        ->get();
        
        //Banner 
        $banner = Banner::where('active',1)
        ->first();
        // Set default parameters
        $params = array(
            'channelId'    => 'UCl69eCjpUj-JwCjGLpzR6kw',
            'type'          => 'video',
            'part'          => 'id, snippet',
            'order'         => 'date',
            'maxResults'    => 8
        );

        //$search = Youtube::searchAdvanced($params, true); //['results' => []];//
        $search = ['results' => []];	
		//Get Tags by setting
        $tags = settings::first();
        $tag = explode(";",$tags->setting);
        $post_tags = array();
        foreach($tag as $t) {
            $tg = Tag::where('name',trim($t))->first();
            if (!empty($tg)) {
                $post_tags[$tg->id] = array(
                    'judul' => $tg->name,
                    'posts'  => $tg->posts
                );
            }
        }

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
            'youtubes'  => $search['results'],
            'banner'    => $banner,
            'posts'      => $post_tags
        );

        return view('pages.home')->with($data);
    }

    public function search() {
        $menu = "home";
        $data = array(
            'title'     => 'Home Page',
            'menu'      => $menu,
        );
        return view('pages.search')->with($data);
    }
}
