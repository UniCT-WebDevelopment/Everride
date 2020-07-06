@extends('layouts.app')

@section('head')

<style>
.loader {
  border: 12px solid black;
  border-radius: 50%;
  border-top: 12px solid gold;
  width: 80px;
  height: 80px;
  -webkit-animation: spin 3s linear infinite; /* Safari */
  animation: spin 3s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

<script>
var x = document.getElementById("demo");
var coordinates;
var myVar;
var stringa;
var gpxdata = "";





function getLocation() {
    var elem = document.getElementById("startButton");
    if (elem.value=="Start"){
        if (navigator.geolocation) {
            StartGps();
                } else { 
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
    } else {
        myStopFunction();
    }
    change();
        
}

function StartGps(){

    myVar = navigator.geolocation.watchPosition(showPosition,error,options); 
    var gpsform = document.getElementById('gpxform');
    gpsform.style.display = 'none';  
    var loaderid = document.getElementById('loaderid');
    loaderid.style.display = 'block';   
}

function myStopFunction() {
    navigator.geolocation.clearWatch(myVar);
    var userinput = document.getElementById('gpxfile');
    var logform = document.getElementById('logform');
    logform.style.display = 'block';
    var loaderid = document.getElementById('loaderid');
    loaderid.style.display = 'none';
    userinput.value = gpxdata;
}

var options = {
  enableHighAccuracy: true,
  timeout: Infinity,
  maximumAge: 0
};

function error(err) {
  console.warn(`ERROR(${err.code}): ${err.message}`);
}

function showPosition(position) {
    var crd = position.coords;
    var time = Date(position.timestamp);


     stringa = "<trkpt lon=\""+crd.longitude+"\" lat=\""+crd.latitude+"\"></trkpt>"

     gpxdata = gpxdata + stringa;

}

function change(){
var elem = document.getElementById("startButton");
var h3frase = document.getElementById("h3frase");

if (elem.value=="Stop") {
    elem.value = "Start"; 
    elem.className = "btn btn-success"; 
    h3frase.innerHTML = "Click the button to start active location";
    }
else {
    elem.value = "Stop"; 
    elem.className = "btn btn-danger";
    h3frase.innerHTML = "Click the button to stop active location";
    }

}


</script>
@endsection


@section('content')

<div class="container">
    <div class="col-8 offset-2">
        <div>
            <h3 id="h3frase">Click the button to start active location</h3>
        </div>
        
        <div class="my-5">
            <input type="button" class="btn btn-success" onclick="getLocation()"  id="startButton" value="Start"></input>
        </div>


        
        <div class="loader" id="loaderid" style="display:none;"></div>

        <form action="/maps/gpxlog" enctype="multipart/form-data" method="post" style="display:none;" id="logform" >

                @csrf

                
                    

                        <div class="form-group ">             
                                <input id="gpxfile"  type="hidden" name="gpxfile" >         
                        </div>
                        @error('gpxfile') 
                            <strong>{{ $message }}</strong>
                        @enderror

                        <div class="form-group ">

                                <label for="title" class="col-md-4 col-form-label ">Track title</label>

                                        
                                <input id="title"  type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"  autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        
                        </div>

                        <div class="form-group ">

                                <label for="description" class="col-md-4 col-form-label ">Track description</label>

                                        
                                <input id="description"  type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        
                        </div>

                        <div class="form-group ">
                            <label for="image" class="col-md-4 col-form-label ">Track Image</label>
                            <input type="file" class='form-control-file' name="image" id="image">
                            @error('image')
                                
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button id="gpsbutton" class="btn btn-primary">Add GPS Log</button>                
                        </div> 
                        
                

            </form>


            <form action="/maps/gpxfile" enctype="multipart/form-data" method="post" id="gpxform" style="display:block;">
                @csrf
                
                    
                        <div class="form-group ">

                                        <label for="title" class="col-md-4 col-form-label ">Track title</label>

                                                
                                        <input id="title"  type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"  autocomplete="title" autofocus>

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                                
                        </div>

                        <div class="form-group ">

                                <label for="description" class="col-md-4 col-form-label ">Track description</label>

                                        
                                <input id="description"  type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        
                        </div>

                        <div class="form-group ">
                                    <label for="image" class="col-md-4 col-form-label ">Track Image</label>
                                    <input type="file" class='form-control-file' name="image" id="image">
                                    @error('image')
                                        
                                        <strong>{{ $message }}</strong>
                                    @enderror
                        </div>

                        <div class="form-group "> 
                                <label for="img" class="col-md-4 col-form-label ">Upload Gpx File</label> <br>
                                    <input type="file" class='form-control-file' id="gpx" name="gpx" accept=".gpx">

                                    @error('gpx')
                                        <strong>errore</strong>
                                    @enderror

                        </div>

                        <div class=" form-group  pt-4">
                                <button id="gpx" class="btn btn-primary">Add Track</button>
                        </div>
 
            </form> 
    </div>
</div>
@endsection
