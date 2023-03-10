@extends('master')
@section('title','Card List Page')
@section('content')

<div class="container-fluid custom_product">
    <div class="col-sm-10">
        <div class=" tranding_product">
            <h4>Results for Products</h4><br>
            <a href="{{ url('/order_now') }}"><button class="btn btn-primary"> Order Now</button></a><br><br>
            @foreach ($products as $item)
            <div class="searched-item row card_list_devider">
                <div class="col-sm-3">
                    <a href="{{ url('/detail',$item->id) }}">
                        <img src="{{ $item->gallery }}" class="tranding_image" alt="">
                    </a>                   
                </div>
                <div class="col-sm-3">                   
                    <div class="tranding_product_name">
                        <h2 class="">{{ $item->name }}</h2>
                        <h5>{{ $item->description }}</h5>
                    </div>
                </div>                   
                <div class="col-sm-3 tranding_product_name">
                    <a href="{{'remove_cart/'}}{{ $item->cart_id  }}"> <button type="button" class="btn btn-primary">Remove Cart</button> </a>
                </div>  
            </div>
            @endforeach
            <a href="{{ url('/order_now') }}"><button class="btn btn-primary"> Order Now</button></a><br><br>
        </div> 
    </div>
</div> 
   
@endsection