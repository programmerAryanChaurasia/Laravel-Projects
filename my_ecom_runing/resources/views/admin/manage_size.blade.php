@extends('admin/layout');
@section('title','Manage size')
@section('container')

    <div>
        @if(session()->has('message'))
        <div class="alert alert-danger" role="alert">
            {{ session('message') }}
        </div>
        @endif
    </div>
   

    <h1>Manage size</h1>
    <a href="{{ route('size') }}">
        <button type="button" class="btn btn-success m-3">Back</button>
    </a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-body">
                    
                    <form action="{{ route('size.manage_size_process') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="size" class="control-label mb-1">size</label>
                            <input id="size" value="{{ $size }}" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                       {{--  <div class="form-group">
                            <label for="size_slug" class="control-label mb-1">status</label>
                            <input id="size_slug" value="{{ $size_slug }}" name="size_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div> --}}
                        <div>
                            @error('size')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                              </div>
                            @enderror
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