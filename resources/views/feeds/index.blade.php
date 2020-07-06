@extends('layouts.app')

@section('content')




<div class="container">

    @foreach($feeds as $feed)
        <div class="d-flex ">
            <div class="col-12 ">  
                <div class=" d-flex p-3" style="background-color : #d3d0c9;">

                    <div class=" flex-column">
                        <strong class="text-dark">User: </strong> 
                        <p>{{$user->username}}</p>
                    </div>

                    <div class=" flex-column">
                        <strong class="text-dark">Type: </strong> 
                        <p>{{$feed->feed_type}}</p>
                    </div>

                    <div class=" flex-column">
                        <strong class="text-dark">Object: </strong> 
                        <p>{{$feed->feed_id}}</p>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

</div>

@endsection
