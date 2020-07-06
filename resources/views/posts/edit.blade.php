@extends('layouts.app')

@section('content')
<div class="container">
    
    <form action="/p/{{ $post->id }}" enctype="multipart/form-data" method="post">

    @csrf
    @method('PATCH')

    <div class="row">
    
        <div class="col-8 offset-2">

            <div class="row">
                <h1>Edit Post</h1>
            </div>
            
            <div class="form-group row">

                                <input id="caption"  type="text" class="form-control @error('caption') is-invalid @enderror" 
                                name="caption" value="{{ old('caption') ?? $post->caption ?? 'no caption' }}"
                                autocomplete="caption" maxlength="256">

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
            </div>

            <div class="row pt-4">
                <button class="btn btn-primary">Save</button>                
            </div>
        </div>    
    </div>

    </form>
    <br><br><br><br><br><br>

</div>
@endsection
