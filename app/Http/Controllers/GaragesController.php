<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;
use App\Garage;

class GaragesController extends Controller
{
    public function __construct()
        
    {

            $this->middleware('auth', ['except' => ['show','index']]);

    }
    
    public function show(Garage $garage){
        
        return view('garages.show', compact('garage'));
    }

    public function index(User $user){

        $garages = $user->garage()->get();
        return view('garages.index', compact('user','garages'));
    }

    public function create(){

        return view('garages.create');
    }

    public function store(){


        $data = request()->validate([
            'brand'=> 'required' , 
            'model'=> 'required' ,
            'year'=> 'required' ,
            'description'=> 'required' ,
            'image'=> ['required','image']
        ]);

        $imagePath=(request('image')->store('uploads','public'));

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,800);
        $image->save();

        $feed_id = auth()->user()->garage()->create([

            'brand'=>$data['brand'],
            'model'=>$data['model'],
            'year'=>$data['year'],
            'description'=>$data['description'],
            'image' => $imagePath
        ])['id'];

        auth()->user()->feeds()->create([ 'feed_id'=>$feed_id , 'feed_type' =>'garage']);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function edit(Garage $garage)
    {

        $this->authorize('update', $garage);
        return view('garages.edit', compact('garage'));

    }

    public function update(Garage $garage){
        
        $this->authorize('update', $garage);

        $data = request()->validate([

            'brand' =>'required',
            'model' => 'required',
            'year' => 'required',
            'description' => 'required',
            'image' =>'',
        ]);
        
        if (request('image')){

        $imagePath=(request('image')->store('profile','public'));

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,800);
        $image->save();
        $imageArray = ['image' => $imagePath];
        }

        $garage->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/garage/{$garage->id}");

    }

    public function destroy(Garage $garage)
    {
        $mem = $garage->user_id;
        $garage->delete();
        return redirect("/garage/index/{$mem}");
    }

}