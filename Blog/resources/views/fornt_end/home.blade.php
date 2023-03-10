@extends('fornt_end.layout')
@section('title','Home Page')
@section('site-heading','My Blog')
@section('subheading','Every thing is posible!!')
@section('background-img')
    background-image: url('{{ asset('fronedEnd/assets/img/home-bg.jpg')}}')
@endsection
@section('content')
  @foreach ($postData as $item)

    <div class="post-preview">
      <a href="{{ url('post/'. $item->id ) }}">
        <h2 class="post-title">{{-- {{ $item->id }} --}}
          {{ $item->title }}
        </h2>
        <h3 class="post-subtitle">
          {{ $item->short_desc }}
        </h3>
      </a>
      <p class="post-meta">
        Posted on {{ $item->added_on }}
      </p>
    </div>
    <hr class="my-4" />

  @endforeach
@endsection