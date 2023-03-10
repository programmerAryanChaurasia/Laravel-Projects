<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
      <div class="container-scroller">
            
        @include('admin.sidebar')
          
        @include('admin.navbar')
            
        <div class="container-fluid page-body-wrapper">
            <div class="container" style="padding-top:100px;">
                @if(session()->has('message'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('message') }}
                  </div>                  
                @endif
                <form action="{{ url('blogs') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="category">Post Category :</label>
                                <input type="text" class="form-control" id="category" name="category" style="color:black;" placeholder="Just Write in one word">
                              </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="title">Post Title :</label>
                                <input type="text" class="form-control" id="title" name="title" style="color:black;" placeholder="write Post Title (max. 10 word )">
                              </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="date">Publish Date :</label>
                                <input type="date" class="form-control" id="date" name="date" style="color:black;" placeholder="write the name">
                              </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 mt-3">
                            <div class="form-group">
                                <label for="thumbnil">Post Thumbnil :</label>
                                <input type="file" class="form-control" id="thumbnil" name="thumbnil" style="color:white; width:100%;">
                            </div>
                        </div>

                        <div class="col-sm-6 mt-3">
                            <div class="form-group">
                                <label for="publisherImage">Publisher Image :</label>
                                <input type="file" class="form-control" id="publisherImage" name="publisherImage" style="color:white; width:100%;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="blog">Write your Blog</label>
                            <textarea style="color:rgb(2, 2, 23);"  name="news" id="" cols="123" rows="5"></textarea>
                        </div>
                    </div> 
                    <button type="submit" class="btn btn-primary btn-lg mt-4">Submit</button>
                </form>
            </div>           
        </div>
    </div>    
    @include('admin.script')
  </body>
</html>