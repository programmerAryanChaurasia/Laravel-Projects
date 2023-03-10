@extends('fornt_end.layout')
@section('title','Post Detail')


@section('site-heading'){{-- ,'Amazing Knowledge') --}}
    {{ $postData[0]->title}}
@endsection

@section('subheading','Problems look mighty small from 150 miles up')
@section('background-img')
    background-image: url('{{ asset('PostImage/'.$postData[0]->image)}}'){{-- fronedEnd/assets/img/post-bg.jpg --}}
@endsection

@section('content')

  <h2 class="section-heading">{{ $postData[0]->short_desc }}</h2>{{-- {{ $postData[0]->image }} --}}
  <p>{{$postData[0]->long_desc }} </p>

@endsection