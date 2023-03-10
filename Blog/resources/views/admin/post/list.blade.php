@extends('admin.layout')
@section('title','Post List')
@section('content')

{{-- <div class="right_col" role="main"> --}}
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Post <small>All Post Related table</small></h3>
          <a href="{{ url('admin/post/add') }}"><button class="btn btn-outline-warning my-3">Add Post</button></a>
          @if(session()->has('message'))
            <div class="alert alert-danger" role="alert">
              {{ session('message') }}
            </div>
          @endif
          
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row" style="display: block">
        <div class="col-md-12 col-sm-12">
          <div class="x_panel">
            <div class="x_content">
              <div class="table-responsive">
                <table class="table table-striped table-bordered jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th width="3%" class="column-title">ID</th>
                      <th width="17%" class="column-title">Title</th>
                      <th width="35%" class="column-title">Short Desc</th>
                      <th width="8%" class="column-title">Date</th>
                      <th width="12%" class="column-title">Image</th>
                      <th width="25%" class="column-title">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($postData as $item)
                      <tr class="even pointer">
                        <td class="">{{ $item->id }}</td>
                        <td class="">{{ $item->title }}</td>
                        <td class="">{{ $item->short_desc }}</td>
                        <td class="">{{ $item->post_date }}</td>
                        <td class="">
                          <img style="height: 60px;" src="{{ url('PostImage/'.$item->image) }}" alt="img">
                        </td>
                        <td class="">

                          @if($item->status==1)
                            <a href="{{ url('/admin/post/status/0/'.$item->id) }}" class="btn btn-outline-warning">Active</a>
                          @else
                            <a href="{{ url('/admin/post/status/1/'.$item->id) }}" class="btn btn-outline-secondary">Deactive</a>
                          @endif
                          <a href="{{ url('/admin/post/edit/'.$item->id) }}" class="btn btn-outline-primary">Edit</a>
                          <a href="{{ url('/admin/post/delete/'.$item->id) }}" class="btn btn-outline-danger">Delete</a>
                        </td>
                      </tr> 
                    @endforeach
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 {{--  </div> --}}

@endsection