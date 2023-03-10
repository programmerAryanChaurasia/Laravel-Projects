@extends('fornt_end.layout')
@section('title')
  {{ $postData[0]->name }}
@endsection
@section('site-heading',$postData[0]->name)
@section('subheading','Every thing is posible!!')
@section('background-img')
    background-image: url('{{ asset('fronedEnd/assets/img/home-bg.jpg')}}')
@endsection
@section('content')
  @foreach ($postData as $item)

    {{ $postData[0]->description }}

  @endforeach
@endsection