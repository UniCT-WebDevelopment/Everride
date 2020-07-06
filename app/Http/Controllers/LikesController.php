<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Map;

use App\User;


class LikesController extends Controller { 
    
    
        

    public function __construct()
        
    {

            $this->middleware('auth', ['except' => ['show']]);

    }

    
    public function store(Post $post){

         auth()->user()->liking()->toggle($post);
         auth()->user()->feeds()->create([ 'feed_id'=>$post->id , 'feed_type' =>'like']);
    }

    public function storemap(Map $map){

        auth()->user()->likingmap()->toggle($map);
        auth()->user()->feeds()->create([ 'feed_id'=>$map->id , 'feed_type' =>'likemap']);
   }
    
    public function show(Post $post){

                
                $ids = $post->likes()->get()->pluck('username');
                $resultsUsers = User::wherein('username',$ids)->orderBy('username', 'asc')->get();
        
                return view('posts.showlikes',compact('resultsUsers','post'));
    }

    public function showmap(Map $map){

        
        $ids = $map->likes()->get()->pluck('username');
        $resultsUsers = User::wherein('username',$ids)->orderBy('username', 'asc')->get();

        return view('maps.showlikes',compact('resultsUsers','map'));
}
    
    
}
