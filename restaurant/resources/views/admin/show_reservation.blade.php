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
              <h1 align="center" class="mb-3" style="font-size:40px; background-color:rgba(246, 255, 0, 0.375); color:rgb(255, 255, 255); font-weight: 900;">All Reversation</h1>

              @if(session()->has('message'))
              <div class="alert alert-primary" role="alert">
                  {{ session('message') }}
              </div>                  
          @endif
        
        <table class="table table-bordered">
            <thead style="background-color:white;">
              <tr>
                <th style="color:black;">Name</th>
                <th style="color:black;">Email</th>
                <th style="color:black;" >Phone</th>
                <th style="color:black;" >Date</th>
                <th style="color:black;" >Time</th>
                <th style="color:black;" >Message</th>
                <th style="color:black;" >Time</th>
                <th style="color:black;" >Delete</th>
              </tr>
            </thead>
            <tbody style="background-color:rgb(51, 51, 145);">
                @foreach ($model as $item)
                  <tr>

                    <td style="color:white;">{{ $item->name }}</td>

                    <td style="color:white;">{{ $item->email }}</td>

                    <td style="color:white;">{{ $item->phone }}</td>

                    <td style="color:white;">{{ $item->date }}</td>

                    <td style="color:white;">{{ $item->time }}</td>

                    <td style="color:white;">{{ $item->message }}</td>

                    <td style="color:white;">{{ $item->number_guests }}</td>
                    
                    <td>
                      <a href="{{ url('delete_reservation',$item->id) }}">
                        <button type="button" class="btn btn-outline-warning">Delete</button>
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