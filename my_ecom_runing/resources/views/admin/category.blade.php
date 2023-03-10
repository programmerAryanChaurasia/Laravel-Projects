@extends('admin/layout');
@section('title','Category')
@section('category_select','active')
@section('container')
<div>
    @if(session()->has('message'))
    <div class="alert alert-danger" role="alert">
        {{ session('message') }}
      </div>
    @endif
</div>
    <h1>Category</h1>
    <a href="category/manage_category">
        <button type="button" class="btn btn-success mt-2">Add Category</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td>{{ $item->category_slug }}</td>
                            <td>
                                @if($item->status==1)
                                    <a href="{{url('/admin/category/status/0',$item->id)}}">
                                        <button type="button" class="btn btn-info">Active</button>
                                    </a>
                                @endif
                                @if($item->status==0)
                                    <a href="{{url('/admin/category/status/1',$item->id)}}">
                                        <button type="button" class="btn btn-secondary">Dactive</button>
                                    </a>
                                @endif
                                <a href="{{url('/admin/category/manage_category',$item->id)}}">
                                    <button type="button" class="btn btn-primary">Edit</button>
                                </a>
                                <a href="{{url('/admin/category/delete',$item->id)}}">
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr> 
                        @endforeach           
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection