@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>Risultati trovati: {{ $enumerate }}</h3>
    <br><br>
    @foreach($resultsUser as $result)

        
        <div class="row d-flex justify-content-center pb-5">
            <div class="col-6 ">
                <a href="/profile/{{ $result->id }}">
                    <div class="pt-3 pb-3 pl-3 pr-3 border " style="background-color : #d3d0c9;">
                        <div class="d-flex justify-content-start">
                            
                            <div>
                                <img src="/storage/{{ $result->profile->image}}" class="rounded-circle w-100" style="max-width: 100px">
                            </div>
                            
                            <div class = "ml-5">
                                <h5><span class="pl-3 font-weight-bold text-dark">{{ $result->username }}</span></h5>
                            </div>
                            
                                            
                        </div>
                        
                        
                    </div>
                </a>
            </div>
        </div>

    @endforeach


</div>
@endsection

