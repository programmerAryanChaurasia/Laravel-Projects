@extends('master')
@section('title','Card List Page')
@section('content')

<div class="container-fluid custom_product">
    <div class="col-sm-6">
        <table class="table mt-5  offset-3">
            <tbody>
                <tr>              
                    <td>Amount</td>
                    <td>$ {{ $total }}</td>              
                </tr>
                <tr>            
                    <td>Tax</td>
                    <td>$ 0</td>              
                </tr>
                <tr>
                    <td>Delivery Amount</td>
                    <td>$ 10</td>                
                </tr>
                <tr>
                    <th>Total Amount</th>
                    <th>$ {{ $total + 10 }}</th>                
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-sm-6 offset-3">
                <form action="/order_place" method="post">
                    @csrf
                    <div class="form-group">
                    <label for="text">Your address:</label>
                    <textarea name="address" class="form-control" id="address"></textarea>
                    </div>
                    <div class="form-group">
                    <label for="pwd">Payment Method</label>
                    <div class="form-check">
                        <input type="radio" value="cash" class="form-check-input" id="radio1" name="payment" value="option1" checked>Online Payment
                      </div>
                      <div class="form-check">
                        <input type="radio" value="cash" class="form-check-input" id="radio2" name="payment" value="option2">EMI Payment                
                      </div>
                      <div class="form-check">
                        <input type="radio" value="cash" class="form-check-input" id="radio2" name="payment" value="option2">Payment on Delivery                      
                      </div>
                    </div><br>
                    <button type="submit" class="btn btn-primary">Order Now</button>
              </form>
            </div>
        </div>
    </div>   
</div> 
   
@endsection