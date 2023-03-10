
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>

      <div class="container-scroller">
            
        @include('admin.sidebar')
          
        @include('admin.navbar')
            

       {{--  <div>
        @if(session()->has('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>                  
        @endif
        </div> --}}
        <div class="container-fluid page-body-wrapper" style="padding-right: 3000px">
        <div class="container mt-5">
          <table class="table table-bordered">
              <thead style="background-color:white;">
                <tr>
                  <th style="color:black;">Customer Name</th>
                  <th style="color:black;" >Appoinment Date</th>
                  <th style="color:black;">Your Message</th>
                  <th style="color:black;">Your Email</th>
                  <th style="color:black;">Date</th>
                  <th style="color:black;">Phone No.</th>
                  <th style="color:black;">Status</th>
                  <th style="color:black;">Change Status</th>
                  <th style="color:black;">Cancle Appoinment</th>
      
                </tr>
              </thead>
              <tbody style="background-color:rgb(51, 51, 145);">
                  @foreach ($appoint as $item)
                  <tr>
                      <td style="color:white;">{{ $item->name }}</td>
                      <td style="color:white;">{{ $item->date }}</td>
                      <td style="color:white;">{{ $item->message }}</td>
                      <td style="color:white;">{{ $item->email }}</td>
                      <td style="color:white;">{{ $item->date }}</td>
                      <td style="color:white;">{{ $item->phone }}</td>
                      <td style="color:white;">{{ $item->status }}</td>
                      <td >
                        <a href="{{ url('appoinmentStatus',$item->id) }}">
                          <button type="button" class="btn btn-outline-warning">Change status</button>
                        </a>
                      </td>
                      <td>
                        <a href="{{ url('cancleAppoinment',$item->id) }}">
                          <button type="button" class="btn btn-outline-danger">Cancle </button>
                        </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
      
        </div>

      </div>
    </div>    

    @include('admin.script')
 
  </body>
</html>