<?php

namespace App\Http\Controllers;

use App\Feed;
use App\User;
use Illuminate\Http\Request;

class FeedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user){

        
        $feeds = $user->feeds()->get()->unique();
        dd($feeds);
        return view('feeds.index', compact('user','feeds'));
    }
}
    