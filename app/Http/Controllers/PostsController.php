<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;
use App\Feed;
use App\Map;




class PostsController extends Controller

{

    


    public function __construct()
        
    {

            $this->middleware('auth', ['except' => ['show']]);

    }

    public function index()
    {
        

        $user = auth()->user()->following()->pluck('profiles.user_id');
        $feeds = Feed::whereIn('user_id', $user)->latest()->get();

        if($user->first() == null){

            $authid = auth()->user()->id;
            $user->push($authid);
            $posts = Post::whereNotIn('user_id', $user)->with('user')->latest()->paginate(5);

        } else { 

            $posts = Post::whereIn('user_id', $user)->with('user')->latest()->paginate(5);
        }

        
        
       
        
        return view('posts.index',compact('posts','feeds'));
    }

    public function create(){

        return view('posts.create');
    }

    public function createmap(Map $map){

        return view('posts.createmap',compact('map'));
    }

    public function store(){


        $data = request()->validate([
            'caption'=> 'required' , 
            'image'=> ['required','image']
        ]);

        $imagePath=(request('image')->store('uploads','public'));

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        $feed_id = auth()->user()->posts()->create([

            'caption'=>$data['caption'],
            'image' => $imagePath,
            'map_id'=> "0",
            ])['id'];

        auth()->user()->feeds()->create([ 'feed_id'=>$feed_id , 'feed_type' =>'post']);
    

        return redirect('/profile/' . auth()->user()->id);
    }

    public function storemap(){


        $data = request()->validate([
            'caption'=> 'required' , 
            'image'=> ['required','image'],
            'map_id'=> 'required'
        ]);

        $imagePath=(request('image')->store('uploads','public'));

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        $feed_id = auth()->user()->posts()->create([

            'caption'=>$data['caption'],
            'image' => $imagePath,
            'map_id'=> $data['map_id']
            ])['id'];

        auth()->user()->feeds()->create([ 'feed_id'=>$feed_id , 'feed_type' =>'post']);
    

        return redirect('/maps/show/'.$data['map_id']);
    }

    public function show(Post $post){

        $liked = (auth()->user()) ? auth()->user()->liking->contains($post->id) : false;

        //$user = User::findOrFail($post->user_id);
        
        $follows = (auth()->user()) ? auth()->user()->following->contains($post->user->id) : false;

        $likesCount = Cache::remember (
            'count.likes.'. $post->id,now()->addSeconds(3) ,
            function () use ($post){
            return $post->likes->count();
        });

        $comments = $post->comment()->get();
        

        return view('posts.show', compact('post','liked','likesCount','follows','comments'));
    }

    public function edit(Post $post){

        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));

    }

    public function update(Request $request,Post $post)
    {

        $this->authorize('update', $post);
        
        $post->update(
            request(['caption'])
        );

        return redirect("/p/{$post->id}");
    }

    public function destroy(Post $post){
        $mem = $post->post_id;
        $post->delete();
        return redirect("/profile/{$post->user_id}");
    }

}
