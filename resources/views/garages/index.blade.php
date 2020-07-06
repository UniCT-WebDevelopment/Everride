@extends('layouts.app')

@section('content')




<div class="container">

    @foreach($garages as $garage)
    <div class="d-flex mb-5">
            <div class="col-12 ">  

                    <div class=" d-flex p-3" style="background-color : #d3d0c9;">

                            <div class="pr-3">
                                <img src="/storage/{{$garage->image}}" class="rounded w-100" style="max-width: 500px">
                            </div>

                            <div class="pl-3 w-75">

                                <div class=" mb-2 p-1 pl-2 rounded w-25"  style="background-color: rgb(244, 243, 241);">
                                    <div class=" flex-column">
                                        <strong class="text-dark">Brand: </strong> 
                                        <p>{{$garage->brand}}</p>
                                    </div>
                                </div>

                                <div class="  mb-2 p-1 pl-2 rounded w-25" style="background-color: rgb(244, 243, 241);">
                                    <div class="flex-column">
                                        <strong class="text-dark">Model: </strong> 
                                        <p>{{$garage->model}}</p>
                                    </div>
                                </div>

                                <div class="  mb-2 p-1 pl-2 rounded w-25" style="background-color: rgb(244, 243, 241);">
                                    <div class="flex-column">
                                        <strong class="text-dark">Year: </strong> 
                                        <p>{{$garage->year}}</p>
                                    </div>
                                </div>

                                <div class=" mb-2 p-1 pl-2 rounded w-75" style="background-color: rgb(244, 243, 241);">
                                    <div class="flex-column">
                                        <strong class="text-dark">Description: </strong> 
                                        <p>{{$garage->description}}</p>
                                    </div>
                                </div>

                                <div class=" pt-1 ">
                                    @can('update', $garage)
                                        <a href="/garage/{{$garage->id}}/edit">Edit</a>
                                     @endcan
                                </div>

                            </div>

                            
                            

                    </div>

            </div>
    </div>
    @endforeach
</div>
@endsection
