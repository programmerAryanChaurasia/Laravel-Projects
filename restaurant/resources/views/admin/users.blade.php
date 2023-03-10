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
                          <th style="color:black;">Name</th>
                          <th style="color:black;">Email</th>
                          <th style="color:black;">Action</th>
                        </tr>
                      </thead>
                      <tbody style="background-color:rgb(51, 51, 145);">
                          @foreach ($data as $item)
                          <tr>
                                <td style="color:white;">{{ $item->name }}</td>
                                <td style="color:white;">{{ $item->email }}</td>
                                @if($item->usertype=="0")
                                    <td>
                                        <a href="{{ url('delete_user',$item->id) }}">
                                            <button type="button" class="btn btn-outline-warning">Delete</button>
                                        </a>
                                    </td>
                                @else
                                    <td><a>Not Allowed</a></td>
                                @endif
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