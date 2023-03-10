@extends('master')
@section('title','Detail Page')
@section('content')

    <div class="container detail_page">
        <div class="row">
            <div class="col-sm-6">
                <div class="container-fluid custom_detail">
                    <img src="{{ $data['gallery'] }}" alt="" class="detail_page_image">
                </div> 
            </div>
            <div class="col-sm-6">
                <h1>{{ $data['name'] }}</h1>
                <h3>Price : {{  $data['price']}} ₹</h3>
                <h5>{{ $data['description'] }}</h5>
                <div class="row mt-4">
                    <div class="col-4">
                        <a href="{{ url('/') }}"><button class="btn btn-primary">Go Back</button></a>
                    </div>
                    <div class="col-4">
                        <form action="{{ url('/detail/add_to_card') }}" method="post">
                            @csrf
                            <input type="hidden" name="add_to_card" id="add_to_card" value="{{ $data['id'] }}"/>
                            <button class="btn btn-primary">Add to Cart</button>
                        </form>
                        
                    </div>
                    <div class="col-4">
                        <a href="#"><button class="btn btn-primary">Buy Now</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>







   
@endsection