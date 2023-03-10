<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.csslink')
  </head>
  <body>
    <div class="container-scroller">
    @include('admin.sidebar')
    <div class="container-fluid page-body-wrapper">

    @include('admin.navbar')

    <div class="main-panel">

        <div class="content-wrapper">
          

            <div class="container" style="padding-top:100px;">
                <h1 align="center" class="mb-3" style="font-size:40px; background-color:rgba(246, 255, 0, 0.375); color:rgb(255, 255, 255); font-weight: 900;">Update Coupon</h1>
  
                  <form action="{{ url('updateCoupon',$CouponCode->id) }}" method="post">
                      @csrf
                        <div class="form-group">
                            <label for="coupon_name">Name :</label>
                            <input type="text" class="form-control" id="coupon_name" value="{{ $CouponCode->coupon_name }}" name="coupon_name" style="color:white; background-color:black;" placeholder="write Coupon Name">
                        </div>
                        @error('coupon_name')
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                {{ $message }}
                            </div>
                        @enderror
  
                        <div class="form-group">
                            <label for="coupon_code">Coupon Code :</label>
                            <input type="text" class="form-control" value="{{ $CouponCode->coupon_code }}" id="coupon_code" name="coupon_code" style="color:white; background-color:black;" placeholder="write Coupon Value">
                        </div>
                        @error('coupon_code')
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                            <label for="coupon_value">Coupon Value :</label>
                            <input type="text" class="form-control" value="{{ $CouponCode->coupon_value }}" id="coupon_value" name="coupon_value" style="color:white; background-color:black;" placeholder="write Coupon Value">
                        </div>
                        @error('coupon_value')
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                {{ $message }}
                            </div>
                        @enderror
  
                      <button type="submit" class="btn btn-primary btn-lg mt-4">Submit</button>
                  </form>
              </div>         

        </div>         
    </div>
    </div>

    @include('admin.jslink')

  </body>
</html>{{--  --}}