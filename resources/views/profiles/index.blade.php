@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 pr-4">
            <img src="/storage/{{ $user->profile->image }}" class="rounded-circle pr-1 w-100" >
        </div>

        <div class="col-9 pt-4 pl-4 border rounded" style="background-color : rgba(221, 218, 212,0.6); ">
            <div class= "d-flex justify-content-between align-items-baseline">

                <div class="d-flex aling-items-center pb-4">
                
                    <div class="h4">{{$user->username}}</div>
                    
                    @can('followprofile', $user->profile)
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endcan 

                </div>

                <div class="d-flex flex-column ">
                    @can('update', $user->profile)
                    <a href="/p/create">Add New Post</a> 

                    @endcan 
                </div>
                
            </div>

            <div class="d-flex justify-content-between">
                @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
    
                
                @endcan
                
            </div>
            

                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $postsCount }}</strong> post</div>
                    <div class="pr-5"><a href="/profile/followers/{{$user->id}}" class="text-dark"><strong>{{ $followersCount }}</strong> followers</a></div>
                    <div class="pr-5"><a href="/profile/following/{{$user->id}}" class="text-dark"><strong>{{ $followingCount }}</strong> following</a></div>
                </div>
                                  
                

                <div class="d-flex justify-content-between">
                    <div class="pt-4 font-weight-bold">
                        {{ $user->profile->title ?? 'no title' }}
                    </div>
                    <div class="pb-2">
                        <button class="btn btn-light "><a href="/maps/index/{{$user->id}}">My Tracks</a></button>
                    </div>
                </div>

                    
                    

                <div class="d-flex justify-content-between">
                        <div>{{ $user->profile->description ?? 'no description'}}</div>
                        <div class="pb-2"><button class="btn btn-light "><a class ="px-2"href="/garage/index/{{$user->id}}">Garage</a></button></div>
                </div>
                <div><a href="{{$user->profile->url}}">{{ $user->profile->url ?? 'N/A' }}</a></div>
                
        </div>
    </div>

    <div class="row pt-5">
        
        @foreach($user->posts as $post)

            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id}}">
                <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
    <br><br><br><br><br><br><br><br><br>            <br><br><br><br><br>
</div>
@endsection
