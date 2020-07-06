@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
                @foreach($posts as $post)

                <p hidden>{{$liked = (auth()->user()) ? auth()->user()->liking->contains($post->id) : false}}</p>
                    
                    <div class="col-12 pb-5 d-flex justify-content-center">
                        <div class="col-12 ">
                        
                            <div class="pt-4 pb-4 pl-4 border " style="background-color : #f4f3f1;">
                                    <div class="p-2 d-flex justify-content-start">
                                            <img src="/storage/{{ $post->user->profile->image}}" class="rounded-circle w-100" style="max-width: 50px">
                                            
                                                <a href="/profile/{{ $post->user->id }}" class="pt-2" >
                                                    <span class="font-weight-bold text-dark pl-4  ">{{ $post->user->username }}</span>
                                                </a>
                                    
                                    
                                    </div>
                                
                            </div>
                                
                            <a href="/p/{{ $post->id }}">
                                <img src="/storage/{{ $post->image }}" class="w-100">
                            </a>
                            <div class="pt-4 pb-4 pl-4 border " style="background-color : #f4f3f1;">
                                <span class="text-break">{{ $post->caption }}</span>

                                <div class="row pt-4 pl-3">

                                    <like-button post-id="{{ $post->id }}" liked="{{ $liked }}"></like-button> 
                                    <span class="pl-1"> piace a <a href="/like/{{$post->id}}">{{$likesCount = $post->likes->count()}}</a> </span> 

                                </div>
                                
                            </div>
                            
                        
                        </div>
                    </div>
                    

                @endforeach
        </div>
        

        <div class="col-5 rounded " style="height: 202px;">
        <h4>Feeds</h4>
                <div class="overflow-auto rounded " style="height: 202px;background-color : #f4f3f1;">
                    @foreach($feeds as $feed)  
                        <div class="pl-2 pr-2 pt-1 pb-1  mt-2 mb-1  rounded" style="background-color : #f4f3f1;">

                            <div class="font-weight-bold pt-1 pr-5 pb-2 mr-2">

                                <a href="/profile/{{ $feed->user_id }}">
                                    <span class="text-dark">{{ $feed->user->username }}</span>
                                </a>           
                            </div>
                            
                            @if ($feed->feed_type == 'comment')
                            <p class="text-break"> added a new <a href="/p/{{$feed->feed_id}}">comment</a></p>
                            @elseif ($feed->feed_type === 'like')
                            <p class="text-break"> liked this <a href="/p/{{$feed->feed_id}}">post</a></p>
                            @elseif ($feed->feed_type === 'likemap')
                            <p class="text-break"> liked this <a href="/maps/show/{{$feed->feed_id}}">map</a></p>
                            @elseif ($feed->feed_type === "post")
                            <p class="text-break"> added a new <a href="/p/{{$feed->feed_id}}">post</a></p>
                            @elseif ($feed->feed_type === 'map')
                            <p class="text-break"> added a new <a href="/maps/show/{{$feed->feed_id}}">map</a></p>
                            @endif
                            

                        </div>
                    @endforeach
                </div>
        </div>

    </div>    

    <div class="row">
        <div class="col-12 d-flex justify-content-center"  >
                {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection

