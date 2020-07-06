@extends('layouts.app')

@section('content')




<div class="container">

    <div class="d-flex ">
            <div class="col-12 ">  

                    <div class=" d-flex p-3" style="background-color : #d3d0c9;">

                            <div class="pr-3">
                                <img src="/storage/{{$garage->image}}" class="rounded w-100" style="max-width: 500px">
                            </div>

                            <div class="pl-3 w-25">

                                <div class=" mb-2 p-1 pl-2 rounded"  style="background-color: rgb(244, 243, 241);">
                                    <div class=" flex-column">
                                        <strong class="text-dark">Brand: </strong> 
                                        <p>{{$garage->brand}}</p>
                                    </div>
                                </div>

                                <div class="  mb-2 p-1 pl-2 rounded" style="background-color: rgb(244, 243, 241);">
                                    <div class="flex-column">
                                        <strong class="text-dark">Model: </strong> 
                                        <p>{{$garage->model}}</p>
                                    </div>
                                </div>

                                <div class="  mb-2 p-1 pl-2 rounded" style="background-color: rgb(244, 243, 241);">
                                    <div class="flex-column">
                                        <strong class="text-dark">Year: </strong> 
                                        <p>{{$garage->year}}</p>
                                    </div>
                                </div>

                                <div class=" mb-2 p-1 pl-2 rounded" style="background-color: rgb(244, 243, 241);">
                                    <div class="flex-column">
                                        <strong class="text-dark">Description: </strong> 
                                        <p>{{$garage->description}}</p>
                                    </div>
                                </div>

                            </div>
                    
                    </div>
            </div>
    </div>

</div>
@endsection
