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
                <h1 align="center" class="mb-3" style="font-size:40px; background-color:rgba(246, 255, 0, 0.375); color:rgb(255, 255, 255); font-weight: 900;">Add Foods</h1>
  
                  <form action="{{ url('update_chef_data',$chefData->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" class="form-control" id="name" value="{{ $chefData->name }}" name="name" style="color:white; background-color:black;" placeholder="write Name">
                      </div>
  
                        <div class="form-group">
                          <label for="speciality">Speciality :</label>
                          <input type="text" class="form-control" value="{{ $chefData->speciality }}" id="speciality" name="speciality" style="color:white; background-color:black;" placeholder="write Price">
                        </div>
  
                        <div class="row">
                          <div class="col-sm-6 mt-3">
                              <div class="form-group">
                                  <label for="chefImg">Chef Image :</label>
                                  <input type="file" class="form-control" id="image" name="chefImg" style="color:white; width:100%;">
                                  <img src="chefImg/{{ $chefData->chefImg }}" width="100px" alt="alt">
                              </div>
                          </div>
                        </div>
                        {{-- <input type="hidden" value="{{ $chefData->id }}" name="hiddenId">   --}}
                      <button type="submit" class="btn btn-primary btn-lg mt-4">Submit</button>
                  </form>
              </div>         

        </div>         
    </div>
    </div>

    @include('admin.jslink')

  </body>
</html>