@extends('layouts.app')
@section('content')

    <div id="slideshow" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
    <li data-target="#slideshow" data-slide-to="0" class="active"></li>
    <li data-target="#slideshow" data-slide-to="1"></li>
    <li data-target="#slideshow" data-slide-to="2"></li>
    <li data-target="#slideshow" data-slide-to="3"></li>
    <li data-target="#slideshow" data-slide-to="4"></li>
    </ul>

    <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="{{url('/image/slide1.jpg')}}" class="d-block w-100" alt="slide1" width="800px" height="500px">
    </div>
    <div class="carousel-item">
        <img src="{{url('/image/slide2.jpg')}}"  class="d-block w-100" alt="slide2" width="800px" height="500px">
    </div>
    <div class="carousel-item">
        <img src="{{url('/image/slide3.jpg')}}"  class="d-block w-100" alt="slide3" width="800px" height="500px">
    </div>
    <div class="carousel-item">
        <img src="{{url('/image/slide4.jpg')}}"  class="d-block w-100" alt="slide4" width="800px" height="500px">
    </div>
    <div class="carousel-item">
        <img src="{{url('/image/slide5.jpg')}}"  class="d-block w-100" alt="slide5" width="800px" height="500px">
    </div>
    </div>

    <a class="carousel-control-prev" href="#slideshow" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#slideshow" data-slide="next">
    <span class="carousel-control-next-icon"></span>
    </a>
  </div>
  @endsection