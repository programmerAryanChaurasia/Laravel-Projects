@extends('layouts.layout')
@section('title','Home')
@section('content')
    <div class="mt-5">
            <div class="text-center">
                <img src="{{ asset('img/aryan.jpg') }}" alt="" class="img-thumbnail" width="250px" height="150px">
            </div>
            <div class="mt-5 text-white mx=5 text-justify">
                <h1 class="fw-bold st-font">Hello,</h1>
                <div class="px-4" style="line-height: 2rem;">
                    <p style="text-indent:100px">I am <b class="text-warning">Aryan Chaurasia</b> having 5 year of full-stsck web development Lorem ipsum, dolor sit amet consectetur adipisicing elit. A enim voluptas accusamus id quasi repudiandae laborum, iusto voluptates ex! Vel. Lorem ipsum dolor sit amet. </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis dolore deleniti quasi laboriosam nostrum doloremque. <b class="text-warning">Full-Stack technical skill</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores libero, numquam optio a sint consequuntur illum hic corrupti dolores. Maxime! Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga consequatur modi esse. Quidem impedit explicabo fuga cupiditate molestiae quod consequatur? </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis harum dolor quidem quod facere praesentium voluptatum quibusdam maiores non labore, alias ullam, distinctio officiis tenetur. Ipsum officia minus eum accusantium. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, cupiditate!</p>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('contact') }}" class="btn btn-outline-warning mx-5 my-3">Hire me</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-info">Contact</a>
            </div>
        </div>
@endsection
  