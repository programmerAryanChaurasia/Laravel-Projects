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
              <a href="{{ url('/add_coupon') }}"> <button class="btn btn-success mb-3">Add Coupon</button> </a>
              <h1 align="center" class="mb-3" style="font-size:40px; background-color:rgba(246, 255, 0, 0.375); color:rgb(255, 255, 255); font-weight: 900;">All Coupon List</h1>

              @if(session()->has('message'))
              <div class="alert alert-primary" role="alert">
                  {{ session('message') }}
              </div>                  
          @endif

        <table class="table table-bordered">
            <thead style="background-color:white;">
              <tr>
                <th style="color:black;" >ID</th>
                <th style="color:black;">Coupon Name</th>
                <th style="color:black;">Coupon Code</th>
                <th style="color:black;">Coupon Value</th>
                <th style="color:black;" >Status</th>
                <th style="color:black;" >Update</th>
                <th style="color:black;" >Delete</th>
              </tr>
            </thead>
            <tbody style="background-color:rgb(51, 51, 145);">
                @foreach ($model as $item)
                  <tr>

                    <td style="color:white;">{{ $item->id }}</td>

                    <td style="color:white;">{{ $item->coupon_name }}</td>

                    <td style="color:white;">{{ $item->coupon_code }}</td>

                    <td style="color:white;">{{ $item->coupon_value }}</td>

                    @if($item->coupon_status==1)
                        <td>
                            <a href="{{ url('coupon_status/0/'.$item->id) }}">
                                <button class="btn btn-primary">Active</button>
                            </a>
                        </td>
                    @else
                        <td>
                            <a href="{{ url('coupon_status/1/'.$item->id) }}">
                                <button class="btn btn-secondary">Disable</button>
                            </a>
                        </td>
                    @endif

                    <td>
                        <a href="{{ url('/update_coupon',$item->id) }}">
                            <button class="btn btn-outline-success">Update</button>
                        </a>
                    </td>
                    
                    <td>
                      <a href="{{ url('delete_coupon',$item->id) }}">
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