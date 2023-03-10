@extends('admin/layout');
@section('title','Manage Coupon')
@section('container')

    <div>
        @if(session()->has('message'))
        <div class="alert alert-danger" role="alert">
            {{ session('message') }}
        </div>
        @endif
    </div>
   

    <h1>Manage Coupon</h1>
    <a href="{{ route('coupon') }}">
        <button type="button" class="btn btn-success m-3">Back</button>
    </a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-body">
                    
                    <form action="{{ route('coupon.manage_coupon_process') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="control-label mb-1">Title Name</label>
                            <input id="title" value="{{ $title }}" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        <div class="form-group">
                            <label for="code" class="control-label mb-1">Code </label>
                            <input id="code" value="{{ $code }}" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        @error('code')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="value" class="control-label mb-1">Value</label>
                            <input id="value" value="{{ $value }}" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        <div>
                            <button id="submit_button" type="submit" class="btn btn-lg btn-info btn-block">
                                Submit
                            </button>
                        </div>
                        <input type="hidden" name="id" value={{ $id }}>
                    </form>
                </div>
            </div>
        </div>
@endsection