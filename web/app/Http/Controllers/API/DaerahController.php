<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Agenda;
use Alaouy\Youtube\Facades\Youtube;

class DaerahController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $menu  = "daerah";
        
         $daerah = Daerah::all();
 
         $data = array(
             'title'     => 'DPD',
             'menu'      => $menu,
             'daerah'    => $daerah
          );
          return response($data);
     }
 
     public function detail($id)
     {
         $menu  = "daerah";
 
         $daerah = Daerah::where('name',$id)->first();
         
         if (!$daerah) {
             abort(404);
         }
 
         //Get News
         $news = Post::where('status',1)
         ->whereHas('dpd',function($q) use ($daerah) {
             $q->where('daerahs.id', '=', $daerah->id);
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
 
         //Get Agenda
         $agendas = Agenda::where('end_date','>=', now())
         ->whereHas('dpd',function($q) use ($daerah) {
             $q->where('daerahs.id', '=', $daerah->id);
         })
         ->limit(3)
         ->orderBy('start_date')
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
 
         $data = array(
             'title'     => $daerah->name,
             'menu'      => $menu,
             'news'      => $news,    
             'galleries'   => $galleries,
             'agendas'   => $agendas,
             'daerah'    => $daerah,
             'youtubes'  => $search['results']            
         );
         return response($data);
     }    
}
