@extends('admin/layout');
@section('title','Manage Color')
@section('container')

    <div>
        @if(session()->has('message'))
        <div class="alert alert-danger" role="alert">
            {{ session('message') }}
        </div>
        @endif
    </div>
   

    <h1>Manage Color</h1>
    <a href="{{ route('color') }}">
        <button type="button" class="btn btn-success m-3">Back</button>
    </a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-body">
                    
                    <form action="{{ route('color.manage_color_process') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="color" class="control-label mb-1">Color Name</label>
                            <input id="color" value="{{ $color }}" name="color" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                       {{--  <div class="form-group">
                            <label for="category_slug" class="control-label mb-1">Category Slug</label>
                            <input id="category_slug" value="{{ $category_slug }}" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div> --}}
                        <div>
                            @error('color')
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