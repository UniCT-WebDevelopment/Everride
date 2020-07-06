@extends('layouts.app')

@section('content')




<div class="container">
    <div class="row">
    
        <div class="col-7 mr-4">
            <img src="/storage/{{ $post->image}}" class="w-100">
        </div>

        <div class="col-4">
            
                <div class="row d-flex justify-content-around">
                        
                            <div class="p-2">
                                <img src="/storage/{{ $post->user->profile->image}}" class="rounded-circle w-100" style="max-width: 50px">
                            </div>

                            <div class="font-weight-bold pt-3 pr-5 mr-2">
                                    
                                    <a href="/profile/{{ $post->user->id }}">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                    </a> 
                                    
                            </div>

                            @can('follow', $post)
                            <div class="p-2">
                                    <follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-button> 
                            </div>
                            @endcan
                        
                </div>

                <hr>

                <div>
                    <p class="text-break">
                        <a href="/profile/{{ $post->user->id }}"> 
                            <span class="font-weight-bold text-dark">{{ $post->user->username }}</span>
                        </a>
                        {{ $post->caption }} 
                    </p>
                </div>

                <div class="d-flex justify-content-between">
                
                    @can('update', $post)
                                                
                        <a style="padding: 0.05rem;" href="/p/{{ $post->id }}/edit"><span class="text-primary ">Edit</span></a>
                                                
                    @endcan

                    @can('delete', $post)
                                                    
                        <form action="/p/{{ $post->id }}" enctype="multipart/form-data" method="post">

                            @csrf
                            @method('DELETE')
                            <button class="btn2 btn-link"><span class="text-dark">Delete post</span></button>
            
                        </form>
                                            
                    @endcan

                </div>

                <br>
                <br>
                

                
                
                
            
                
            
            

                <div class="h-25 pt-2 overflow-auto rounded">
                    

                        @foreach($comments as $comment)  

                                <div class="pl-2 pr-2 pt-1 pb-1  mt-2 mb-1 border rounded" style="background-color : #f4f3f1;">

                                    <div class="font-weight-bold pt-1 pr-5 pb-2 mr-2">

                                        <a href="/profile/{{ $comment->user->id }}">
                                        <span class="text-dark">{{ $comment->user->username }}</span>
                                        </a> 
                                        
                                    </div>
                                    <p class="text-break"> {{ $comment->content}}</p>

                                    <div class=" d-flex justify-content-between">

                                        @can('update', $comment)
                                            
                                                <a style="padding: 0.05rem;" href="/comments/{{ $comment->id }}/edit"><span class="text-primary ">Edit</span></a>
                                            
                                        @endcan 

                                        @can('delete', $comment)
                                                
                                                <form action="/comments/{{ $comment->id }}" enctype="multipart/form-data" method="post">

                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn2 btn-link "><span class="text-dark">Delete</span></button>
        
                                                </form>
                                        
                                        @endcan

                                    </div>
                                    

                                </div>

                                
                        @endforeach

                </div>  

                <div class="row pt-4 pb-3 pl-3">

                    <div class="pr-3">
                        <like-button post-id="{{ $post->id }}" liked="{{ $liked }}"></like-button> 
                    </div>
                                        
                        <span>Likes</span><a href="/like/{{$post->id}}"><h7 style="color:#b30000 ; margin-left: 7px"> {{ $likesCount }} </h7></a>
                </div>
                
                <div>
                    
                    <form action="/comments/{{$post->id}}" enctype="multipart/form-data" method="post" id="form-comment">
                        @csrf

                        <div class="pt-4">
                                                                
                                <div class="d-flex justify-content-center ">
                                    <textarea rows="2" cols="30" name="comment" form="form-comment" 
                                    class="form-control @error('comment') is-invalid @enderror" maxlength="1000" placeholder="wrtie a comment">
                                    </textarea>
                                    @error('comment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror         
                                </div>

                                <div class="d-flex justify-content-center pt-2 pb-2">
                                    <button class="btn btn-secondary">Add comment </button>                
                                </div>
                        </div>
                            
                    </form> 

                </div>

            
        </div>

            
        
    </div>
    
    

</div>
@endsection
