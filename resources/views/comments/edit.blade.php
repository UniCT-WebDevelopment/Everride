@extends('layouts.app')

@section('content')
<div class="container">
    
    <form action="/comments/{{ $comment->id }}" enctype="multipart/form-data" method="post">

    @csrf
    @method('PATCH')

    <div class="row">
    
        <div class="col-8 offset-2">

            <div class="row">
                <h1>Edit Comment</h1>
            </div>
            
            <div class="form-group row">

                                <input id="content"  type="text" class="form-control @error('content') is-invalid @enderror" 
                                name="content" value="{{ old('content') ?? $comment->content ?? 'no content' }}"
                                autocomplete="content" autofocus>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
            </div>

            <div class="row pt-4">
                <button class="btn btn-primary">Save </button>                
            </div>
        </div>    
    </div>

    </form>
    <br><br><br><br><br><br>

</div>
@endsection
