@extends('admin.layout')
@section('title','Page List')
@section('content')

{{-- <div class="right_col" role="main"> --}}
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Page <small>All Page Related table</small></h3>
          <a href="{{ url('admin/page/add') }}"><button class="btn btn-outline-warning my-3">Add Page</button></a>
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
                      <th width="15%" class="column-title">Name</th>
                      <th width="15%" class="column-title">Slug</th>
                      <th width="34%" class="column-title">Description</th>
                      <th width="8%" class="column-title">Added On</th>
                      <th width="25%" class="column-title">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pageData as $item)
                      <tr class="even pointer">
                        <td class="">{{ $item->id }}</td>
                        <td class="">{{ $item->name }}</td>
                        <td class="">{{ $item->slug }}</td>
                        <td class="">{{ $item->description }}</td>
                        <td class="">{{ $item->added_on }}</td>
                        <td class="">
                          @if($item->status==1)
                            <a href="{{ url('/admin/page/status/0/'.$item->id) }}" class="btn btn-outline-warning">Active</a>
                          @else
                            <a href="{{ url('/admin/page/status/1/'.$item->id) }}" class="btn btn-outline-secondary">Deactive</a>
                          @endif
                          <a href="{{ url('/admin/page/edit/'.$item->id) }}" class="btn btn-outline-primary">Edit</a>
                          <a href="{{ url('/admin/page/delete/'.$item->id) }}" class="btn btn-outline-danger">Delete</a>
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