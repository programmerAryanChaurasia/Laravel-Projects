@extends('admin/layout');
@section('title','Coupon')
@section('coupon_select','active')
@section('container')
<div>
    @if(session()->has('message'))
    <div class="alert alert-danger" role="alert">
        {{ session('message') }}
      </div>
    @endif
</div>
    <h1>Coupon</h1>
    <a href="{{ route('manage.coupon') }}">{{-- category/manage_category --}}
        <button type="button" class="btn btn-success mt-2">Add Coupon</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Value</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->value }}</td>
                            <td>
                                @if($item->status==1)
                                    <a href="{{url('/admin/coupon/status/0',$item->id)}}">
                                        <button type="button" class="btn btn-info">Active</button>
                                    </a>
                                @endif
                                @if($item->status==0)
                                    <a href="{{url('/admin/coupon/status/1',$item->id)}}">
                                        <button type="button" class="btn btn-secondary">Dactive</button>
                                    </a>
                                @endif
                                <a href="{{url('/admin/coupon/manage_coupon',$item->id)}}">
                                <button type="button" class="btn btn-primary">Edit</button>
                                </a>
                                <a href="{{url('/admin/coupon/delete',$item->id)}}">
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