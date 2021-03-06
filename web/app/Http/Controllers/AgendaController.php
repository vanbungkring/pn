<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
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
        $menu  = "agenda";

        $news = Agenda::orderBy('end_date','desc')->paginate(9);
        
        $data = array(
            'title'     => 'Agenda',
            'menu'      => $menu,
            'agendas'    => $news,    
         );
        return view('pages.list.agenda')->with($data);
    }

    public function detail($id, Request $request)
    {
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

        //Get page view
        $path = $request->path();
        $pageViews = DB::table('tracker_paths')
        ->join('tracker_log', 'tracker_paths.id', '=', 'tracker_log.path_id')
        ->select('*')
        ->where('tracker_paths.path', $path)
        ->get();
        $pv = count($pageViews);  
 
        
        $data = array(
            'title'     => $news->name,
            'menu'      => $menu,
            'prev'      => $prev,
            'news'      => $news,    
            'next'      => $next,
            'mores'     => $more,
            'newest'    => $newest,
            'views'     => $pv
        );
        return view('pages.agenda')->with($data);
    }    
    
}
