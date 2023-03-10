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
              <h1 align="center" class="mb-3" style="font-size:40px; background-color:rgba(246, 255, 0, 0.375); color:rgb(255, 255, 255); font-weight: 900;">Add Foods</h1>
                @if(session()->has('message'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('message') }}
                  </div>                  
                @endif

                <form action="{{ url('add_food') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="title">Title :</label>
                      <input type="title" class="form-control" id="title" name="title" style="color:white;" placeholder="write Title">
                    </div>

                      <div class="form-group">
                        <label for="price">Price :</label>
                        <input type="price" class="form-control" id="price" name="price" style="color:white;" placeholder="write Price">
                      </div>

                      <div class="form-group mt-3">
                        <label for="description">Description :</label>
                        <input type="description" class="form-control" id="description" name="description" style="color:white;" placeholder="Write Description">
                      </div>

                      <div class="row">
                        <div class="col-sm-6 mt-3">
                            <div class="form-group">
                                <label for="doctorImg">Food Image :</label>
                                <input type="file" class="form-control" id="doctorImg" name="image" style="color:white; width:100%;">
                            </div>
                        </div>
                      </div>  
                    <button type="submit" class="btn btn-primary btn-lg mt-4">Submit</button>
                </form>
            </div>           
            <div class="container" style="padding-top:100px;">
              <h1 align="center" class="mb-3" style="font-size:40px; background-color:rgba(246, 255, 0, 0.375); color:rgb(255, 255, 255); font-weight: 900;">All Food Items</h1>

              @if(session()->has('message'))
              <div class="alert alert-primary" role="alert">
                  {{ session('message') }}
              </div>                  
          @endif
        <table class="table table-bordered">
            <thead style="background-color:white;">
              <tr>
                <th style="color:black;">Image</th>
                <th style="color:black;">Title</th>
                <th style="color:black;" >Price</th>
                <th style="color:black;" >Update Price</th>
                <th style="color:black;" >Delete Food in List</th>
              </tr>
            </thead>
            <tbody style="background-color:rgb(51, 51, 145);">
                @foreach ($food as $item)
                  <tr>
                
                    <td style="color:white;"> <img  src="Food_Image/{{ $item->image }}" style="height:75px; width:75px;" alt="img"> </td>

                    <td style="color:white;">{{ $item->title }}</td>

                    <td style="color:white;">{{ $item->price }}</td>
                    
                    <td>
                        <a href="{{ url('update_food',$item->id) }}">
                          <button type="button" class="btn btn-outline-warning">Update</button>
                        </a>
                    </td>

                    <td>
                      <a href="{{ url('delete_food',$item->id) }}">
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