
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
        <div class="container-fluid page-body-wrapper">
        <div class="container mt-5">
            @if(session()->has('message'))
                <div class="alert alert-primary" role="alert">
                    {{ session('message') }}
                </div>                  
            @endif
          <table class="table table-bordered">
              <thead style="background-color:white;">
                <tr>
                  <th style="color:black;">Image</th>
                  <th style="color:black;">Doctor Name</th>
                  <th style="color:black;" >Phone No.</th>
                  <th style="color:black;">Room No.</th>
                  <th style="color:black;">specialist</th>
                  <th style="color:black;">Update</th>
                  <th style="color:black;">Delete</th>
                </tr>
              </thead>
              <tbody style="background-color:rgb(51, 51, 145);">
                  @foreach ($doctor as $item)
                  <tr>
                    @if($item->doctorImg)
                        <td style="color:white;"> <img  src="DoctorImage/{{ $item->doctorImg }}" style="height:75px; width:75px;" alt="img"> </td>
                    @else
                        <td>Img Not Uploded</td>
                    @endif 
                        <td style="color:white;">{{ $item->name }}</td>
                        <td style="color:white;">{{ $item->phone }}</td>
                        <td style="color:white;">{{ $item->room }}</td>
                        <td style="color:white;">{{ $item->speciality }}</td>
                        <td>
                            <a href="{{ url('update_doctor_record',$item->id) }}">
                              <button type="button" class="btn btn-outline-warning">Update</button>
                            </a>
                        </td>
                        <td>
                          <a href="{{ url('delete_doctor',$item->id) }}">
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

    @include('admin.script')
 
  </body>
</html>