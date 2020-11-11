<?php

namespace App\Backend\Controllers;

use App\Models\Press;

use App\Http\Controllers\Controller;
use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Http\Request;
use Twitter;

class TweetController extends Controller
{
    public function tweet(Request $request){
        $data = $request->all();
        $status = $data['title']." ".$data['url'];
        $tweet = ['status' => $status];
        
        Twitter::postTweet($tweet);        
        return ;
    }
}