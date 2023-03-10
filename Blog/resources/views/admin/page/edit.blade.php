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

             {{--  @php
                  echo "<pre>";
                  print_r($postData[0]->id);
                  echo "<br>". $postData[0]->id;
                  die();
              @endphp  --}}

              <form class="form-horizontal form-label-left" action="{{ url('/admin/page/edit/submit/'.$pageData[0]->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6"><input type="text" id="name" value="{{ $pageData[0]->name }} " name="name" required="required" class="form-control"/></div>
                  @error('name')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>


                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="slug">slug <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6"><input type="text" value="{{ $pageData[0]->slug }} "  id="slug" maxlength="100" name="slug" required="required" class="form-control"/></div>
                  @error('slug')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6"><textarea name="description"  required="required" class="form-control" id="description" >{{ $pageData[0]->description }}</textarea></div>
                  @error('description')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>


                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="page_date">Page Date <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6"><input type="date" value="{{ $pageData[0]->added_on }} "  id="page_date" name="page_date" required="required" class="form-control"/>
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