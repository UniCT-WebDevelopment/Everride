@extends('layouts.app')

@section('content')
<div class="container">
    
    <form action="/garage/{{ $garage->id }}" enctype="multipart/form-data" method="post">

    @csrf
    @method('PATCH')

    <div class="row">
    
        <div class="col-8 offset-2">

            <div class="row">
                <h1>Edit Vehicle</h1>
            </div>
            
            <div class="form-group">
                    <div class="d-flex row">
                        <label for="brand" class="col-md-4 col-form-label ">Brand</label>
                    </div>
                    <div class="d-flex row">
                        <select class="form-control" name="brand" id="brand">
                                        <optgroup label="Marche principali">
                                        <option value="aprilia">Aprilia</option>
                                        <option value="benelli">Benelli</option>
                                        <option value="betamotor">Betamotor</option>
                                        <option value="bimota">Bimota</option>
                                        <option value="bmw">Bmw</option>
                                        <option value="borile">Borile</option>
                                        <option value="buell">Buell</option>
                                        <option value="cagiva">Cagiva</option>
                                        <option value="cr-s">Cr&amp;S</option>
                                        <option value="daelim">Daelim</option>
                                        <option value="derbi">Derbi</option>
                                        <option value="ducati">Ducati</option>
                                        <option value="fantic-motor">Fantic Motor</option>
                                        <option value="fb-mondial">FB Mondial</option>
                                        <option value="garelli">Garelli</option>
                                        <option value="gas-gas">Gas Gas</option>
                                        <option value="gilera">Gilera</option>
                                        <option value="hanway">Hanway</option>
                                        <option value="harley-davidson">Harley-Davidson</option>
                                        <option value="hm">HM</option>
                                        <option value="honda">Honda</option>
                                        <option value="husaberg">Husaberg</option>
                                        <option value="husqvarna">Husqvarna</option>
                                        <option value="indian">Indian</option>
                                        <option value="italjet-moto">Italjet Moto</option>
                                        <option value="kawasaki">Kawasaki</option>
                                        <option value="ktm">KTM</option>
                                        <option value="kymco">Kymco</option>
                                        <option value="lml">Lml</option>
                                        <option value="mash-italia">Mash Italia</option>
                                        <option value="montesa">Montesa</option>
                                        <option value="moto-guzzi">Moto Guzzi</option>
                                        <option value="moto-morini">Moto Morini</option>
                                        <option value="mv-agusta">MV Agusta</option>
                                        <option value="ohvale">Ohvale</option>
                                        <option value="over">Over</option>
                                        <option value="peugeot">Peugeot</option>
                                        <option value="piaggio">Piaggio</option>
                                        <option value="qooder">Qooder</option>
                                        <option value="quadro">Quadro</option>
                                        <option value="rieju">Rieju</option>
                                        <option value="royal-enfield">Royal Enfield</option>
                                        <option value="scorpa">Scorpa</option>
                                        <option value="sherco">Sherco</option>
                                        <option value="suzuki">Suzuki</option>
                                        <option value="swm">Swm</option>
                                        <option value="sym">Sym</option>
                                        <option value="tgb">Tgb</option>
                                        <option value="tm-moto">Tm Moto</option>
                                        <option value="triumph">Triumph</option>
                                        <option value="ural">Ural</option>
                                        <option value="valenti-racing">Valenti Racing</option>
                                        <option value="vespa">Vespa</option>
                                        <option value="victory">Victory</option>
                                        <option value="yamaha">Yamaha</option>
                                        <option value="zero">Zero</option>
                                        </optgroup>
                                        <optgroup label="Altre marche">
                                        <option value="adiva">Adiva</option>
                                        <option value="adly">Adly</option>
                                        <option value="aeon">Aeon</option>
                                        <option value="aie">Aie</option>
                                        <option value="arctic-cat">Arctic Cat</option>
                                        <option value="askoll">Askoll</option>
                                        <option value="atala">Atala</option>
                                        <option value="bajaj">Bajaj</option>
                                        <option value="brixton-motorcycles">Brixton Motorcycles</option>
                                        <option value="bucci-moto">Bucci Moto</option>
                                        <option value="can-am-brp">Can-Am Brp</option>
                                        <option value="castiello-moto">Castiello Moto</option>
                                        <option value="cf-moto">CF Moto</option>
                                        <option value="ch-racing">CH Racing</option>
                                        <option value="cpi-moto">CPI Moto</option>
                                        <option value="di-blasi">Di Blasi</option>
                                        <option value="dinli">Dinli</option>
                                        <option value="dnepr">Dnepr</option>
                                        <option value="energica">Energica</option>
                                        <option value="general-cycles">General Cycles</option>
                                        <option value="generic">Generic</option>
                                        <option value="ghezzi-brian">Ghezzi-Brian</option>
                                        <option value="goes">Goes</option>
                                        <option value="green23">Green23</option>
                                        <option value="headbanger">Headbanger</option>
                                        <option value="hyosung">Hyosung</option>
                                        <option value="jotagas">Jotagas</option>
                                        <option value="keeway-motor">Keeway Motor</option>
                                        <option value="kl">Kl</option>
                                        <option value="ksr-moto">KSR Moto</option>
                                        <option value="kuberg">Kuberg</option>
                                        <option value="lambretta">Lambretta</option>
                                        <option value="laverda">Laverda</option>
                                        <option value="lem-motor">Lem Motor</option>
                                        <option value="leonart">Leonart</option>
                                        <option value="linhai">Linhai</option>
                                        <option value="malaguti">Malaguti</option>
                                        <option value="mbk">Mbk</option>
                                        <option value="me">ME</option>
                                        <option value="millepercento">Millepercento</option>
                                        <option value="mondial">Mondial</option>
                                        <option value="morini">Morini</option>
                                        <option value="moto-bellini">Moto Bellini</option>
                                        <option value="motom">Motom</option>
                                        <option value="motor-union">Motor Union</option>
                                        <option value="motorini-zanini">Motorini Zanini</option>
                                        <option value="motron">Motron</option>
                                        <option value="niu">Niu</option>
                                        <option value="ossa">Ossa</option>
                                        <option value="paton">Paton</option>
                                        <option value="pedamotor-italia">Pedamotor Italia</option>
                                        <option value="pgo">Pgo</option>
                                        <option value="polaris">Polaris</option>
                                        <option value="senke">Senke</option>
                                        <option value="siamoto">Siamoto</option>
                                        <option value="simonini">Simonini</option>
                                        <option value="sky-team">Sky Team</option>
                                        <option value="solex">Solex</option>
                                        <option value="somoto">Somoto</option>
                                        <option value="super-soco">Super Soco</option>
                                        <option value="sur-ron">Sur - Ron</option>
                                        <option value="trs-motorcycles">TRS Motorcycles</option>
                                        <option value="um-italia">Um Italia</option>
                                        <option value="valenti">Valenti</option>
                                        <option value="vent">Vent</option>
                                        <option value="vertemati">Vertemati</option>
                                        <option value="vertigo">Vertigo</option>
                                        <option value="vervemoto">Vervemoto</option>
                                        <option value="villa">Villa</option>
                                        <option value="vor">Vor</option>
                                        <option value="vyrus">Vyrus</option>
                                        <option value="wt-motors">WT Motors</option>
                                        <option value="zontes">Zontes</option>
                                        <option value="-altre-moto-o-tipologie"> Altre moto o tipologie</option>
                        </select>
                    </div>

                                    @error('brand')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                </div>

            <div class="form-group row">
                            <label for="model" class="col-md-4 col-form-label ">Model</label>

                            
                                <input id="model"  type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') ?? $garage->model ?? 'no model' }}"  autocomplete="model" autofocus>

                                @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
            </div>

            <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label ">Year</label>

                            
                                <input id="year"  type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') ?? $garage->year ?? 'no year' }}"  autocomplete="year" autofocus>

                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
            </div>

            <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label ">Description</label>

                            
                                <input id="description"  type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $garage->description ?? 'no description' }}"  autocomplete="description" autofocus>

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
                
                @can('delete', $garage)                       
                    <form action="/garage/{{ $garage->id }}" enctype="multipart/form-data" method="post">
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
