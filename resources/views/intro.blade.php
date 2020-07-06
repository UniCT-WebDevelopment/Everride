<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>
    

 <!-- Fonts -->
 <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<style>
.py-4{

                
background : transparent;
}
body{
background : transparent;
}
html{

background: url(/img/Picto-Map_png2%.png);
background-color:#EEE9E1 ;

background-repeat: repeat;
background-size: 50% ;
margin-top : 8% ;
}
.navbar-custom {
background-color: #21140C;
}
a{
color : brown;

}
a:hover {
color: #e60000;
text-decoration: none;
}

.titolo{
color : #FFD700;
text-transform: uppercase;
letter-spacing: 3px;
}
.colorbutton{

background-color : #301C10;
}
.colorbutton:hover{

background-color : #b30000;
}
.colorbutton2{

-webkit-writing-mode: horizontal-tb !important;
text-rendering: auto;
color: none;
letter-spacing: normal;
word-spacing: normal;
text-transform: none;
text-indent: 0px;
text-shadow: none;
display: inline-block;
text-align: center;
align-items: flex-start;
cursor: default;
box-sizing: border-box;
margin: 0em;
font: 400 13.3333px Arial;
padding: 0px 0px;
border-width: 0px;
border-style: outset;
border-image: initial;
background-color : transparent;
border-color: none;
box-shadow: none;

}

.colorbutton2:hover{

background-color : transparent;
}
.colorbutton2:active{

}
.colorbutton2:focus{
outline: none;
border-color: black;
box-shadow: transparent;
}

.btn2 {
display: inline-block;
font-weight: 400;
color: #212529;
text-align: center;
vertical-align: middle;
cursor: pointer;
-webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
        user-select: none;
background-color: transparent;
border: 0px solid transparent;
padding: 0rem 0rem;
font-size: 0.9rem;
line-height: 1.6;
border-radius: 0.25rem;
transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}


* {box-sizing: border-box}

.mySlides {display: none}


/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.textcustom2 {
  color: #black;
  font-size: 15px;
  padding: 8px 12px;
  
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #black;
  font-size: 12px;
  padding: 8px 12px;
  
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade2 {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}

}
</style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark shadow-sm fixed-top navbar-custom ">
            <div class="container">
                <a class="navbar-brand d-flex"  href="{{ url('/') }}">
                    
                    <div class="pl-1 pt-1 titolo"> <h4>{{ config('app.name', 'Laravel') }}</h4></div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav" style=" margin-left: 27%">
                                    <div >
                                        <form class="form-inline form-control-lg" method="GET" action="/profile/search/">

                                            <div><input class="mr-2" type="text" name="key" required="inerisci un nome "></div> 
                                            <div><button class="btn btn-secondary btn-sm" type="submit">Search</button></div>
                                        </form>
                                    </div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto d-flex align-self-stretch">
                    
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="" style="color: #FFD700 ; font-size:18px ; cursor: pointer;" onclick="window.location='/profile/{{ Auth::user()->id }}';">{{ Auth::user()->username }}</span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            
                            <li class="nav-item dropdown pl-2">
                                
                                <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="" style="color: #FFD700 ; font-size:18px">add+</span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <a class="dropdown-item" href="/p/create">Add New Post</a> 
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/garage/create">Add New vehicle</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/maps/create">Add New Track</a>
                                    </a>

                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

    <div class="slideshow-container">

    <div class="mySlides fade2">
    <div class="numbertext">1 / 12</div>
    <img src="storage/intro/home.png" style="width:100%">
    <div class="textcustom2 ">1.View recent post,search and add content</div>
    </div>

    <div class="mySlides fade2">
    <div class="numbertext">2 / 12</div>
    <img src="storage/intro/search.png" style="width:100%">
    <div class="textcustom2">2.View result of your research</div>
    </div>

    <div class="mySlides fade2">
    <div class="numbertext">3 / 12</div>
    <img src="storage/intro/profile.png" style="width:100%">
    <div class="textcustom2">3.View info and foto of user</div>
    </div>

    <div class="mySlides fade2">
    <div class="numbertext">4 / 12</div>
    <img src="storage/intro/editprofile.png" style="width:100%">
    <div class="textcustom2">4.Update profile and insert a profile image</div>
    </div>

    <div class="mySlides fade2">
    <div class="numbertext">5 / 12</div>
    <img src="storage/intro/addpost.png" style="width:100%">
    <div class="textcustom2">5.Add Post </div>
    </div>

    <div class="mySlides fade2">
    <div class="numbertext">6 / 12</div>
    <img src="storage/intro/addgarage.png" style="width:100%">
    <div class="textcustom2">6.Add Vehicle </div>
    </div>

    <div class="mySlides fade2">
    <div class="numbertext">7 / 12</div>
    <img src="storage/intro/garage.png" style="width:100%">
    <div class="textcustom2">7.Garage View the Garage</div>
    </div>

    <div class="mySlides fade2">
    <div class="numbertext">8 / 12</div>
    <img src="storage/intro/maketrack.png" style="width:100%">
    <div class="textcustom2">8.Add a new track</div>
    </div>

    <div class="mySlides fade2">
    <div class="numbertext">9 / 12</div>
    <img src="storage/intro/activelocation.png" style="width:100%">
    <div class="textcustom2">9.Start Active location</div>
    </div>

    <div class="mySlides fade2">
    <div class="numbertext">10 / 12</div>
    <img src="storage/intro/saveactivelocation.png" style="width:100%">
    <div class="textcustom2">10.Save Active location</div>
    </div>

    <div class="mySlides fade2">
    <div class="numbertext">11 / 12</div>
    <img src="storage/intro/maketrack.png" style="width:100%">
    <div class="textcustom2">11.Upload your own GPXfile</div>
    </div>

    <div class="mySlides fade2">
    <div class="numbertext">12 / 12</div>
    <img src="storage/intro/trackindex.png" style="width:100%">
    <div class="textcustom2">12.View your track</div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>
    <br>
    
    <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span> 
    <span class="dot" onclick="currentSlide(5)"></span> 
    <span class="dot" onclick="currentSlide(6)"></span> 
    <span class="dot" onclick="currentSlide(7)"></span> 
    <span class="dot" onclick="currentSlide(8)"></span> 
    <span class="dot" onclick="currentSlide(9)"></span> 
    <span class="dot" onclick="currentSlide(10)"></span> 
    <span class="dot" onclick="currentSlide(11)"></span> 
    <span class="dot" onclick="currentSlide(12)"></span>  
    </div>

    <div class="p-3">
        <a href="/"><h5>End intro</h3></a>
    </div>
    
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace("active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>
</html> 




