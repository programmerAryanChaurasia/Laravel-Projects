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
              <h1 align="center" class="mb-3" style="font-size:40px; background-color:rgba(246, 255, 0, 0.375); color:rgb(255, 255, 255); font-weight: 900;">Add Chefs</h1>
                @if(session()->has('message'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('message') }}
                  </div>                  
                @endif

                <form action="{{ url('add_chef') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="name">Chef Name :</label>
                      <input type="text" class="form-control" id="name" name="name" style="color:white; background-color:black;" placeholder="write Name" required>
                      @error('name')
                        <div class="alert alert-primary mt-2" role="alert">
                          {{ $message }}
                        </div> 
                      @enderror
                    </div>

                      <div class="form-group">
                        <label for="speciality">Speciality :</label>
                        <input type="text" class="form-control" id="speciality" name="speciality" style="color:white; background-color:black;" placeholder="write speciality" required>
                        @error('speciality')
                          <div class="alert alert-primary mt-2" role="alert">
                            {{ $message }}
                          </div> 
                        @enderror
                      </div>

                      <div class="row">
                        <div class="col-sm-6 mt-3">
                            <div class="form-group">
                                <label for="chefImg">Chef Image :</label>
                                <input type="file" class="form-control" id="chefImg" name="chefImg" style="color:white; width:100%;" required>
                            </div>
                        </div>
                      </div>  
                    <button type="submit" class="btn btn-primary btn-lg mt-4">Submit</button>
                </form>
            </div>           
            <div class="container" style="padding-top:100px;">
              <h1 align="center" class="mb-3" style="font-size:40px; background-color:rgba(246, 255, 0, 0.375); color:rgb(255, 255, 255); font-weight: 900;">All Joined Chefs</h1>

        <table class="table table-bordered">
            <thead style="background-color:white;">
              <tr>
                <th style="color:black;" >Image</th>
                <th style="color:black;">Name</th>
                <th style="color:black;">Speciality</th>
                <th style="color:black;" >Update Price</th>
                <th style="color:black;" >Delete Food in List</th>
              </tr>
            </thead>
            <tbody style="background-color:rgb(51, 51, 145);">
                @foreach ($chefdata as $item)
                  <tr>
                
                    <td style="color:white;"> <img  src="chefImg/{{ $item->chefImg }}" style="height:75px; width:75px;" alt="img"> </td>

                    <td style="color:white;">{{ $item->name }}</td>

                    <td style="color:white;">{{ $item->speciality }}</td>
                    
                    <td>
                        <a href="{{ url('update_chef',$item->id) }}">
                          <button type="button" class="btn btn-outline-warning">Update</button>
                        </a>
                    </td>

                    <td>
                      <a href="{{ url('delete_chef',$item->id) }}">
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