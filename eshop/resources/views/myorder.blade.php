@extends('master')
@section('title','Card List Page')
@section('content')

<div class="container-fluid custom_product">
    <div class="col-sm-10">
        <div class=" tranding_product">
            <h4>My Orders</h4><br>
            @foreach ($orders as $item)
            <div class="searched-item row card_list_devider">
                <div class="col-sm-4">
                    <a href="{{ url('/detail',$item->id) }}">
                        <img src="{{ $item->gallery }}" class="tranding_image" alt="">
                    </a>                   
                </div>
                <div class="col-sm-6">                   
                    <div class="tranding_product_name">
                        <h2 class="">Name  :  {{ $item->name }}</h2>
                        <h5>Delivery Status  :  {{ $item->status }}</h5>
                        <h5>Address  : {{ $item->address }}</h5>
                        <h5>Payment_status  :  {{ $item->payment_status }}</h5>
                        <h5>Payment Method  : {{ $item->payment_method }}</h5>
                    </div>
                </div>                   
            </div>
            @endforeach
        </div> 
    </div>
</div> 
   
@endsection