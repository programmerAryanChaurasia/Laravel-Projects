<!DOCTYPE html>
<html lang="en">
  <head>
    
    @include('admin.csslink')
  </head>
  <body>
    <div class="container-scroller">
    @include('admin.sidebar')
    <div class="container-fluid page-body-wrapper">

    @include('admin.navbar')

    <div class="main-panel">

        <div class="content-wrapper">
          
            {{-- Body --}}
                   
        <div class="container" style="padding-top:100px;">
          <h1 align="center" class="mb-3" style="font-size:40px; background-color:rgba(246, 255, 0, 0.375); color:rgb(255, 255, 255); font-weight: 900;">All Booked Item List</h1>

        @if(session()->has('message'))
          <div class="alert alert-primary" role="alert">
              {{ session('message') }}
          </div>                  
        @endif

        <table class="table table-bordered">
            <thead style="background-color:white;">
              <tr>
                <th style="color:black;" >ID</th>
                <th style="color:black;"> Name</th>
                <th style="color:black;">Card Number</th>
                <th style="color:black;">Expiration</th>
                <th style="color:black;" >CVV</th>
                <th style="color:black;" >User Id</th>
                <th style="color:black;" >Food Id</th>
                <th style="color:black;" >Amount</th>
               
                <th style="color:black;" >Delete</th>
              </tr>
            </thead>
            <tbody style="background-color:rgb(51, 51, 145);">
                @foreach ($model as $item)
                  <tr>

                    <td style="color:white;">{{ $item->id }}</td>
                    <td style="color:white;">{{ $item->card_holder_name }}</td>
                    <td style="color:white;">{{ $item->card_number }}</td>
                    <td style="color:white;">{{ $item->expiration }}</td>
                    <td style="color:white;">{{ $item->cvv }}</td>
                    <td style="color:white;">{{ $item->user_id }}</td>
                    <td style="color:white;">{{ $item->food_id }}</td>
                    <td style="color:white;">{{ $item->total_amount }}</td>

                    <td>
                      <a href="{{ url('delete_order',$item->id) }}">
                        <button type="button" class="btn btn-outline-danger">Delete</button>
                      </a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
            </div>


        </div>         
    </div>
    </div>

    @include('admin.jslink')

  </body>
</html>