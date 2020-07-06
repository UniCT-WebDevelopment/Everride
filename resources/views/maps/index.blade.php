@extends('layouts.app')

@section('content')




<div class="container">

    @foreach($maps as $map)
    <div class="d-flex mb-5" style="cursor: pointer;"  onclick="window.location='/maps/show/{{$map->id}}';">
            <div class="col-12 ">
                    <div class=" d-flex p-3" style="background-color : #d3d0c9;">
                        

                            <div class="pr-3">
                                <img src="/storage/{{$map->image}}" class="rounded w-100" style="max-width: 500px">
                            </div>

                            <div class="pl-3 w-75 d-flex flex-column justify-content-between ">

                                <div class=" mb-2 p-1 pl-2 rounded w-25"  style="background-color: rgb(244, 243, 241);">
                                    <div class=" flex-column">
                                        <strong class="text-dark">Title: </strong> 
                                        <p>{{$map->title}}</p>
                                    </div>
                                </div>

                                <div class=" mb-2 p-1 pl-2 rounded w-75" style="background-color: rgb(244, 243, 241);">
                                    <div class="flex-column">
                                        <strong class="text-dark">Description: </strong> 
                                        <p>{{$map->description}}</p>
                                    </div>
                                </div>

                                <div class=" pt-1 d-flex flex-column justify-content-end ">
                                    @can('update', $map)
                                        <a href="/maps/{{$map->id}}/edit">Edit</a>
                                        <a href="/p/createmap/{{$map->id}}">Add Photo</a>
                                     @endcan
                                </div>

                            </div>

                            
                        

                    </div>

            </div>   
    </div>
    @endforeach
</div>
@endsection
