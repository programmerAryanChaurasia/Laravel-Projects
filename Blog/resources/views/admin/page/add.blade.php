@extends('admin.layout')
@section('title','Manage Page')
@section('content')

{{-- <div class="right_col" role="main"> --}}
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Manage Page</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="x_panel">
            <div class="x_content">
              <br />
              <form class="form-horizontal form-label-left" action="{{ url('/admin/page/add/submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6"><input type="text" id="name" name="name" required="required" class="form-control"/></div>
                  @error('name')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>


                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="short_desc">slug <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6"><input type="text" id="slug" maxlength="100" name="slug" required="required" class="form-control"/></div>
                  @error('slug')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6"><textarea name="description" required="required" class="form-control" id="description" ></textarea></div>
                  @error('description')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>


                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="page_date">page Date <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6"><input type="date" id="page_date" name="page_date" required="required" class="form-control"/>
                  </div>
                  @error('page_date')
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