@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        
    </div>

    
    <form action="/comments/{{$post->id}}" enctype="multipart/form-data" method="post" id="form-comment">

        @csrf

        <div class="row d-flex justify-content-center">
            <div class="col-8">
                <div class="d-flex justify-content-center">
                    <img src="/storage/{{ $post->image}}" class="w-75"  >
                </div>
                
                    <div class="form-group ">
                                    <div class="d-flex justify-content-center">
                                        <label for="comment" class="col-form-label "><h5>Comment</h5></label>
                                    </div>
                                    
                                    
                                    <div>
                                    <textarea rows="4" cols="50" name="comment" form="form-comment" class="form-control @error('comment') is-invalid @enderror" maxlength="1000">
                                            </textarea>
                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                        
                                    
                    </div>

                <div class="row pt-4 pl-3">
                    <button class="btn btn-primary">Add new </button>                
                </div>
            </div>    
        </div>

    </form>

</div>
@endsection
