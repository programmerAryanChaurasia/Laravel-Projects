<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<style>
    @media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}
</style>
<body>
    

    
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">

            <a href="#"><button class="btn btn-success">Back</button></a><br>
            
            @if(session()->has('order'))
              <div class="alert alert-primary" role="alert">
                {{ session('order') }}
              </div>   
            @endif

          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card">
                <div class="card-body p-4">
      
                  <div class="row">
      
                    <div class="col-lg-7">
                      <h5 class="mb-3"><a href="#!" class="text-body"><i
                            class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                      <hr>
      
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                          <p class="mb-1">Shopping cart</p>

                          @php
                          $count=0;   
                          @endphp
                          @foreach ($cartData as $item)
                            @php
                              $count++;
                            @endphp
                          @endforeach

                          <p class="mb-0">You have {{ $count }} items in your cart</p>
                        </div>
                      </div>

                      @php
                        $totalPrice=0;
                        $foodId=array();
                      
                      @endphp

                      @foreach ($cartData as $item)
                   
                        <div class="card mb-3">
                            <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                <div>
                                    <img
                                    src="Food_Image/{{ $item->image }}"
                                    class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                </div>
                                <div class="ms-3">
                                    <h5>{{ $item->title }}/h5>
                                </div>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                <div style="width: 50px;">
                                    <h5 class="fw-normal mb-0">
                                        <button>{{ $item->bookCart }}</button>
                                    </h5>
                                </div>
                                <div style="width: 80px;">
                                    <h5 class="m">${{ $item->price }}</h5>
                                </div>

                                @php
                                 $totalPrice = $totalPrice + (int)$item->bookCart * (int)$item->price;
                                @endphp
                                
                                
                                <a href="{{ url('delete_cart_item/'.$item->id) }}" style="color: #cecece;"><button class="btn btn-outline-danger">Delete</button></a>
                              </div>
                              @php
                                  $foodId[]=$item->foodId;
                              @endphp
                            </div>
                            </div>
                        </div>
                      @endforeach
                    </div>
                  {{--   @php
                      foreach ($foodId as $item){
                          echo $item;
                          echo "<br>";
                        }
                    @endphp --}}

                    <div class="col-lg-5">
                      <div class="card bg-primary text-white rounded-3">
                        <div class="card-body">


                      <form action="{{ url('/apply_coupon') }}">
                        @if(session()->has('message'))
                          <p style="color:white; background-color:green;">{{ session('message') }}</p>
                        @endif
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-outline form-white mb-4">
                              <input type="text" id="typeName" class="form-control form-control-lg"
                                placeholder="Coupon Code (optional)" name="couponCode"/>
                               {{--  <p>Coupon Value = {{ $data }}</p> --}}
                            </div>
                          </div>
                          <div class="col-md-4">
                            <a href="#"> <button type="submit" class="btn btn-success btn-lg">Enter</button> </a>
                          </div>
                        </div>
                        <div class="row" style="margin-top:-2px; padding-top:-2px;">
                          <div class="col-sm-12">

                          @if(session()->has('message'))
                          <h5 style="color:rgba(229, 255, 0, 0.975);">Coupon Value =  {{ $data=session('data') }}</h5>
                          @endif
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>





                    <form class="mt-1" action="{{ url('/book_order') }}" method="post">
                      @csrf
                      <div class="card bg-primary text-white rounded-3">
                        <div class="card-body">

                          <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0">Card details</h5>
                          </div>

                          
                            <div class="form-outline form-white mb-4">
                              <input type="text" id="typeName" name="card_holder" class="form-control form-control-lg" siez="17"
                                placeholder="Cardholder's Name" required/>
                              <label class="form-label" for="typeName">Cardholder's Name</label>
                            </div>
      
                            <div class="form-outline form-white mb-4">
                              <input type="text" id="typeText" name="card_number" class="form-control form-control-lg" siez="17"
                                placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" required/>
                              <label class="form-label" for="typeText">Card Number</label>
                            </div>
      
                            <div class="row mb-4">
                              <div class="col-md-6">
                                <div class="form-outline form-white">
                                  <input type="text" id="typeExp" name="card_expiration" class="form-control form-control-lg"
                                    placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" required/>
                                  <label class="form-label" for="typeExp">Expiration</label>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-outline form-white">
                                  <input type="password" id="typeText" name="cvv" class="form-control form-control-lg"
                                    placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" required/>
                                  <label class="form-label" for="typeText">Cvv</label>
                                </div>
                              </div>
                            </div>
                          <hr class="my-4">
                          <div class="d-flex justify-content-between">
                            <h5 class="mb-2">Subtotal</h5>
                            <h5 class="mb-2">${{ $totalPrice }}</h5>
                          </div>

                          @php
                            /* if product price is more than equal to 500 then delivery cost=0 */
                            if($totalPrice>=500){
                                $delivery_cost=0;
                              }
                            else{
                              $delivery_cost=20.00;
                            }
                            
                          @endphp
                          <div class="d-flex justify-content-between">
                            <h5 class="mb-2"> Delivery Cost</h5>
                            <h5 class="mb-2">${{ $delivery_cost }}</h5>
                          </div>

                          @php
                            /* GST Calculation */
                            $gst=($totalPrice*18)/100
                          @endphp
                          <div class="d-flex justify-content-between">
                            <h5 class="mb-2"> GST (18%) </h5>
                            <h5 class="mb-2">${{ $gst }}</h5>
                          </div>

                          
                          
                          
                          @php
                          /*  Total Amount Incl. Taxes */
                            $totalInclTases = $totalPrice + $delivery_cost +  $gst - $data;
                            if($totalInclTases<0){
                              $totalInclTases=0;
                            }
                          @endphp
                          <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-2">Total(Incl. taxes)</h5>
                            <h5 class="mb-2">${{ $totalInclTases }}</h5>
                          </div>
                          <input type="hidden" value="{{ $totalInclTases }}" name="total_amount">



                          {{-- All Food Id present in $foodId Array save it in array --}}
                           {{-- <input type="hidden" value="{{ $foodId }}" name="food_id"> --}}
                            <button class="btn btn-info btn-block btn-lg">Buy Now</button>

                        </div>
                      </div>
                    </form>
      
                    </div>
      
                  </div>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



   {{--    <form action="/abc">
        <input type="text">
        @php
          $abc=0;
        @endphp
        <button>abdjkj</button>
      </form> --}}
</body>
</html>