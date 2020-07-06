<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;
use App\Garage;
use App\Map;


class MapsController extends Controller
{
    public function __construct()
        
    {

            $this->middleware('auth', ['except' => ['show','index']]);

    }
    
    public function show(Map $map){
        
        $pathname = "storage/".$map->gpx;
        $myfile = fopen($pathname, "r") or die("Unable to open file!");
        $rawtext = fread($myfile,filesize($pathname));
        $lonpos = strpos($rawtext, 'lon="');
        $lonval = substr($rawtext,$lonpos+5,6);

        $latpos = strpos($rawtext, 'lat="');
        $latval = substr($rawtext,$latpos+5,6);

        $follows = (auth()->user()) ? auth()->user()->following->contains($map->user->id) : false;
        $liked = (auth()->user()) ? auth()->user()->likingmap->contains($map->id) : false;

        $likesCount = Cache::remember (
            'count.likes.'. $map->id,now()->addSeconds(3) ,
            function () use ($map){
            return $map->likes->count();
        });

        return view('maps.show', compact('map','lonval','latval','follows','liked','likesCount'));
    }

    public function create(){
        
        return view('maps.gpxgen');
    }

    public function index(User $user){

        $maps = $user->maps()->get();
        return view('maps.index', compact('user','maps'));
    }


    public function storegpxlog(){

        $data = request()->validate([
            'gpxfile'=> 'required' , 
            'title'=> 'required',
            'image'=> 'image',
            'description' => 'required',
        ]);
        
        if($data['image'] == 'null'){
            $imagePath = 'profile/unnamed.png';
        } else {
            $imagePath=(request('image')->store('uploads','public')); 
        }
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1422,800);
        $image->save();

        $gpxName = $data['title'];
        $gpxHead = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><gpx version=\"1.0\"><name>Example gpx</name>
            <trk><name>".$gpxName."</name>
            <trkseg>";
        $trkpt = $data['gpxfile'];
        $gpxTail = "</trkseg></trk></gpx>";
        $gpxMerged = $gpxHead.$trkpt.$gpxTail;


        $gpxPath = "/public/gpx/";
        $gpxPathDatabase = "gpx/";

        $userId = auth()->user()->id;
        $uniqueID = uniqid();
        $fileExtension = ".gpx";
        $gpxFileName = $gpxPath.$userId.$uniqueID.$fileExtension;
        $gpxFileNameDatabase = $gpxPathDatabase.$userId.$uniqueID.$fileExtension;

        Storage::put($gpxFileName,$gpxMerged);

        $idmaps = auth()->user()->maps()->create([

            'title'=>$data['title'],
            'image' => $imagePath,
            'gpx' => $gpxFileNameDatabase,
            'description' =>$data['description']
            ])['id'];
        
            $feed_id = $idmaps;
        
            auth()->user()->feeds()->create([ 'feed_id'=>$feed_id , 'feed_type' =>'map']);

            return redirect('/maps/show/' . $idmaps);
    }

    public function storegpxfile(){

        $data = request()->validate([
            'gpx'=>'mimetypes:text/xml|required' , 
            'title'=> 'required',
            'image'=> 'image',
            'description' => 'required',
        ]);
        
        if($data['image'] == 'null'){
            $imagePath = 'profile/unnamed.png';
        } else {
            $imagePath=(request('image')->store('uploads','public')); 
        }
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1422,800);
        $image->save();

        $gpxfile = request()->file('gpx');
        $gpxData = (string) file_get_contents($gpxfile);
        $gpxPath = "/public/gpx/";
        $gpxPathDatabase = "gpx/";

        
        $userId = auth()->user()->id;
        $uniqueID = uniqid();
        $fileExtension = ".gpx";
        $gpxFileName = $gpxPath.$userId.$uniqueID.$fileExtension;
        $gpxFileNameDatabase = $gpxPathDatabase.$userId.$uniqueID.$fileExtension;


        Storage::put($gpxFileName,$gpxData);

        $idmaps = auth()->user()->maps()->create([

            'title'=>$data['title'],
            'image' => $imagePath,
            'gpx' => $gpxFileNameDatabase,
            'description' =>$data['description']
            ])['id'];

            return redirect('/maps/show/' . $idmaps);
    }

    public function edit(Map $map)
    {

        $this->authorize('update', $map);
        return view('maps.edit', compact('map'));

    }

    public function update(Map $map){
        
        $this->authorize('update', $map);

        $data = request()->validate([

            'title' =>'required',
            'description' => 'required',
            'image' =>'',
        ]);
        
        if (request('image')){

        $imagePath=(request('image')->store('uploads','public'));

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1422,800);
        $image->save();
        $imageArray = ['image' => $imagePath];
        }

        $map->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/maps/show/{$map->id}");

    }

    public function destroy(Map $map)
    {
        $mem = $map->user_id;
        $map->delete();
        return redirect("/maps/index/{$mem}");
    }

}