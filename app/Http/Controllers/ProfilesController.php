<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class ProfilesController extends Controller
{
    public function index($user)
    {

        $user = User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postsCount = Cache::remember (
                'count.posts.'. $user->id,now()->addSeconds(30) ,
                function () use ($user){
                return $user->posts->count() ;
        });

        $followersCount = Cache::remember (
            'count.followers.'. $user->id,now()->addSeconds(30) ,
            function () use ($user){
            return $user->profile->followers->count();
        });
        
        $followingCount = Cache::remember (
            'count.following.'. $user->id,now()->addSeconds(30) ,
            function () use ($user){
            return $user->following->count();
        });

        return view('profiles.index',compact('user', 'follows', 'postsCount','followersCount','followingCount'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        
        return view('profiles.edit', compact('user'));
    }

    public function search(Request $request)
    {
        
        $key = request('key');
        
        $query =  $key .'%' ;

        /*
        $resultsDB = DB::table('users')
        ->select('username','id')
        ->where('username' ,'LIKE' ,$query)
        ->orderBy('username', 'asc')
        ->get();
        */

        
        $resultsUser = User::where('username' ,'LIKE' ,$query)->orderBy('username', 'asc')->get();
        $enumerate = count($resultsUser);

        return view('profiles.search',compact('resultsUser','enumerate'));
    }


    public function update(User $user){
        
        $this->authorize('update', $user->profile);

        $data = request()->validate([

            'title' =>'required',
            'description' => 'required',
            'url' => 'url',
            'image' =>'',
        ]);
        
        if (request('image')){

        $imagePath=(request('image')->store('profile','public'));

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $image->save();
        $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");

    }

    public function followers(User $user){

        //dd($post->likes());
        $ids = $user->profile->followers()->pluck('username');
        $resultsUsers = User::wherein('username',$ids)->orderBy('username', 'asc')->get();

        return view('profiles.showfollowers',compact('resultsUsers','user'));
    }

    public function following(User $user){

        //dd($post->likes());
        $ids = $user->following()->pluck('profile_id');;
        $resultsUsers = User::wherein('id',$ids)->orderBy('username', 'asc')->get();

        return view('profiles.showfollowing',compact('resultsUsers','user'));
    }
}
