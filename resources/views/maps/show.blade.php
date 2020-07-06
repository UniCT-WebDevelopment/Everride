@extends('layouts.app')

@section('head')

    
	<script src="http://www.openlayers.org/api/OpenLayers.js"></script>
	<script src="http://www.openstreetmap.org/openlayers/OpenStreetMap.js"></script>

	<script type="text/javascript">
		
		var lat={{ $latval}}
		var lon={{ $lonval}}
		var zoom=13

		var map; //complex object of type OpenLayers.Map

		function init() {
			map = new OpenLayers.Map ("map", {
				controls:[
					new OpenLayers.Control.Navigation(),
					new OpenLayers.Control.PanZoomBar(),
					new OpenLayers.Control.LayerSwitcher(),
					new OpenLayers.Control.Attribution()],
				maxExtent: new OpenLayers.Bounds(-20037508.34,-20037508.34,20037508.34,20037508.34),
				maxResolution: 156543.0399,
				numZoomLevels: 19,
				units: 'm',
				projection: new OpenLayers.Projection("EPSG:900913"),
				displayProjection: new OpenLayers.Projection("EPSG:4326")
			} );

			// Define the map layer
			// Here we use a predefined layer that will be kept up to date with URL changes
			layerMapnik = new OpenLayers.Layer.OSM.Mapnik("Mapnik");
			map.addLayer(layerMapnik);
			layerCycleMap = new OpenLayers.Layer.OSM.CycleMap("CycleMap");
			map.addLayer(layerCycleMap);
			layerMarkers = new OpenLayers.Layer.Markers("Markers");
			map.addLayer(layerMarkers);

			// Add the Layer with the GPX Track
			var lgpx = new OpenLayers.Layer.Vector("{{$map->title}}", {
				strategies: [new OpenLayers.Strategy.Fixed()],
				protocol: new OpenLayers.Protocol.HTTP({
					url: "/storage/{{$map->gpx}}",
					format: new OpenLayers.Format.GPX()
				}),
				style: {strokeColor: "blue", strokeWidth: 10, strokeOpacity: 0.8},
				projection: new OpenLayers.Projection("EPSG:4326")
			});
			map.addLayer(lgpx);

			var lonLat = new OpenLayers.LonLat(lon, lat).transform(new OpenLayers.Projection("EPSG:4326"), map.getProjectionObject());
			map.setCenter(lonLat,zoom);

			var size = new OpenLayers.Size(21, 25);
			var offset = new OpenLayers.Pixel(-(size.w/2), -size.h);
			var icon = new OpenLayers.Icon('http://www.openstreetmap.org/openlayers/img/marker.png',size,offset);
			
		}
	</script>
@endsection

@section('body')
onload="init();"
@endsection

@section('content')

	<div class="container">
    <div class="row">
    
		<div class="col-7 mr-4">	
			<div style="width:100%; height:100%" id="map"></div>
		</div>

        <div class="col-4">
            
                <div class="row d-flex justify-content-around">
                        
                            <div class="p-2">
                                <img src="/storage/{{ $map->user->profile->image}}" class="rounded-circle w-100" style="max-width: 50px">
                            </div>

                            <div class="font-weight-bold pt-3 pr-5 mr-2">
                                    
                                    <a href="/profile/{{ $map->user->id }}">
                                    <span class="text-dark">{{ $map->user->username }}</span>
                                    </a> 
                                    
                            </div>

                            <div class="p-2">
                                    <follow-button user-id="{{ $map->user->id }}" follows="{{ $follows }}"></follow-button> 
                            </div>
                                
                        
                </div>

                <hr>

                <div>
                    <p class="text-break">
                        <h5>{{ $map->title }} </h5>
                    </p>
                </div>

				<div>
                    <p class="text-break">
                            {{ $map->description }}
                    </p>
                </div>

                <div class="d-flex justify-content-between">
                
                    @can('update', $map)
                                                
                        <a style="padding: 0.05rem;" href="/maps/{{ $map->id }}/edit"><span class="text-primary ">Edit</span></a>
                                                
                    @endcan

                    @can('delete', $map)
                                                    
                        <form action="/maps/{{ $map->id }}" enctype="multipart/form-data" method="post">

                            @csrf
                            @method('DELETE')
                            <button class="btn2 btn-link"><span class="text-dark">Delete map</span></button>
            
                        </form>
                                            
                    @endcan

                </div>

                <br>
                <br>
                

                <div class="row pt-4 pb-3 pl-3">

                    <div class="pr-3">
                        <map-button map-id="{{ $map->id }}" liked="{{ $liked }}"></map-button> 

                    </div>
                    
                    <span>Likes</span><a href="/likemap/{{$map->id}}"><h7 style="color:#b30000 ; margin-left: 7px">{{ $likesCount }} </h7></a>
					
                </div>
                
                
            
                
            
            

                <div class="h-25 pt-2 overflow-auto rounded">
                    

                </div>  

                <div>
                             

                </div>

            
        </div>

		<div class="row pt-5">
        
        @foreach($map->posts as $post)

            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id}}">
                <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
        
    </div>
    
    

</div>

@endsection

