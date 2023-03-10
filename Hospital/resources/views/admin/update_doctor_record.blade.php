<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
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
                <form action="{{ url('change_doctor_data',$data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="name">Write Your Name :</label>
                      <input type="text" class="form-control" id="name" value="{{ $data->name }}" name="name" style="color:black;" placeholder="write the name">
                    </div>

                      <div class="form-group">
                        <label for="phone">Write Your Phone :</label>
                        <input type="number" class="form-control" id="phone" value="{{ $data->phone }}" name="phone" style="color:black;" placeholder="write phone number">
                      </div>

                      <div class="form-group mt-3">
                        <label for="room">Write Room Number :</label>
                        <input type="text" class="form-control" id="room" value="{{ $data->room }}" name="room" style="color:black;" placeholder="Write Room Number ">
                      </div>

                      <div class="row">
                        <div class="col-sm-6">
                            <label for="name">Speciality :</label><br>
                            <select class="form-select" type="text" class="form-control" id="name" value="{{ $data->speciality }}" name="speciality" style="color:black; width:100%;"aria-label="Default select example">
                                <option>--Select--</option>
                                <option value="skin">Skin</option>
                                <option value="heart">Heart</option>
                                <option value="eye">Eye</option>
                                <option value="nose">Nose</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="img">Old Image</label>
                                        <img style="height: 100px" src="DoctorImage/{{ $data->doctorImg }}" alt="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="doctorImg">Change Image :</label>
                                        <input type="file" class="form-control" id="doctorImg" name="image" style="color:white; width:100%;">
                                    </div>
                                </div>
                                {{-- <label for="doctorImg">Doctor Image :</label>
                                <input type="file" class="form-control" id="doctorImg" name="image" style="color:white; width:100%;">
                                <label for="img">Old Image</label>
                                <img style="height: 100px" src="DoctorImage/{{ $data->doctorImg }}" alt=""> --}}
                            </div>
                        </div>
                      </div>  
                    <button type="submit" class="btn btn-primary btn-lg mt-4">Submit</button>
                </form>
            </div>   

    </div>    

    @include('admin.script')
  </body>
</html>