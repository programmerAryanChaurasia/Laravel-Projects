@extends('admin.layout')
@section('title','Manage Post')
@section('content')

{{-- <div class="right_col" role="main"> --}}
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Manage Post</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="x_panel">
            <div class="x_content">
              <br />
              <form class="form-horizontal form-label-left" action="{{ url('/admin/post/add/submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6"><input type="text" id="title" name="title" required="required" class="form-control"/></div>
                  @error('title')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>


                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="short_desc">short_desc <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6"><input type="text" id="short_desc" maxlength="100" name="short_desc" required="required" class="form-control"/></div>
                  @error('short_desc')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="long_desc">Long Desc<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6"><textarea name="long_desc" required="required" class="form-control" id="long_desc" ></textarea></div>
                  @error('long_desc')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>


                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="post_date">Post Date <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6"><input type="date" id="post_date" name="post_date" required="required" class="form-control"/>
                  </div>
                  @error('post_date')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image </label>
                  <div class="col-md-6 col-sm-6"><input type="file" id="image" name="image" class="form-control" required/>
                  </div>
                  @error('image')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>

                
                <div class="ln_solid"></div>
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                    <button class="btn btn-primary" type="reset"> Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
{{--   </div> --}}

@endsection