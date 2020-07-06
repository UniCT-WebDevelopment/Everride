@extends('layouts.app')

@section('content')
<div class="container">
    
    <form action="/maps/{{ $map->id }}" enctype="multipart/form-data" method="post">

    @csrf
    @method('PATCH')

    <div class="row">
    
        <div class="col-8 offset-2">

            <div class="row">
                <h1>Edit Track</h1>
            </div>
            
                    

            <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label ">title</label>

                            
                                <input id="title"  type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $map->title ?? 'no title' }}"  autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
            </div>

            

            <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label ">Description</label>

                            
                                <input id="description"  type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $map->description ?? 'no description' }}"  autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
            </div>

            <div class="row ">
                <label for="image" class="col-md-4 col-form-label "> Image</label>
                <input type="file" class='form-control-file' name="image" id="image">
                @error('image')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>

            

            <div class="d-flex justify-content-between row pt-4">
                <button class="btn btn-primary">Save</button> 

            
        </form>
                
                @can('delete', $map)                       
                    <form action="/maps/{{ $map->id }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-secondary btn-link "><span class="text-light">Delete</span></button>
                    </form>                 
                @endcan

            </div> 

        </div>    
    </div>

    
            
    <br><br><br><br><br><br>

</div>
@endsection
