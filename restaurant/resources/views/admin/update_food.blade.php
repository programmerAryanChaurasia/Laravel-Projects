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
            {{-- Body --}}   

            <div class="container" style="padding-top:100px;">
                <h1 align="center" class="mb-3" style="font-size:40px; background-color:rgba(246, 255, 0, 0.375); color:rgb(255, 255, 255); font-weight: 900;">Add Foods</h1>
                  @if(session()->has('message'))
                      <div class="alert alert-primary" role="alert">
                          {{ session('message') }}
                    </div>                  
                  @endif
  
                  <form action="{{ url('update_chef_data') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="title">Title :</label>
                        <input type="title" class="form-control" id="title" value="{{ $food->title }}" name="title" style="color:white;" placeholder="write Title">
                      </div>
  
                        <div class="form-group">
                          <label for="price">Price :</label>
                          <input type="price" class="form-control" value="{{ $food->price }}" id="price" name="price" style="color:white;" placeholder="write Price">
                        </div>
  
                        <div class="form-group mt-3">
                          <label for="description">Description :</label>
                          <input type="description" class="form-control" id="description" value="{{ $food->description }}" name="description" style="color:white;" placeholder="Write Description">
                        </div>
  
                        <div class="row">
                          <div class="col-sm-6 mt-3">
                              <div class="form-group">
                                  <label for="image">Food Image :</label>
                                  <input type="file" class="form-control" id="image" name="image" style="color:white; width:100%;">
                                  <img src="Food_Image/{{ $food->image }}" style="hight:100px;" alt="alt">
                              </div>
                          </div>
                        </div>
                        <input type="hidden" value="{{ $food->id }}" name="hiddenId">  
                      <button type="submit" class="btn btn-primary btn-lg mt-4">Submit</button>
                  </form>
              </div>         

        </div>         
    </div>
    </div>

    @include('admin.jslink')

  </body>
</html>