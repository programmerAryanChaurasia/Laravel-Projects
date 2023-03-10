@extends('master')
@section('title','Login Page')
@section('content')
    <div class="container custom_login pt-5">
        <div class="row">
            <div class="col-sm-4 offset-md-4">
                <h1>Login Page</h1>
                @if(session()->has('error'))
                    {{ session('error') }}
                @enderror
                <form action="{{ url('login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email"/>
                      
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password"/>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>   
@endsection