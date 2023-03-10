@extends('master')
@section('title','Product Page')
@section('content')
    <div class="container-fluid custom_product">

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($products as $item)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$item['id']-1}}" class="{{ $item['id']==1 ? 'active': '' }}" aria-current="true" aria-label="Slide 1"></button>
                {{--     <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($products as $item)            
                    <div class="carousel-item {{ $item['id']==1 ? 'active' : '' }}">
                        <img src="{{ $item['gallery'] }}" class="d-block w-100 carousel_image" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $item['name'] }}</h5>
                            <p>{{ $item['description'] }}</p>
                        </div>
                    </div>               
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
        
            <div class="row tranding_product">
                @foreach ($products as $item)
                <div class="col-sm-3">                   
                    <a href="{{ url('/detail',$item['id']) }}"><img src="{{ $item['gallery'] }}" class="tranding_image" alt=""></a>
                    <div class="tranding_product_name">
                        <h5 class="">{{ $item['name'] }}</h5>
                    </div>
                </div>
                @endforeach
               {{--  <div class="col-sm-4">
                    
                </div>
                <div class="col-sm-4">
                    
                </div>
                <div class="col-sm-4">
                    
                </div> --}}
            </div> 
    </div> 
@endsection