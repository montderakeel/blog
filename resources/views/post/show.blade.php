@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid text-center">
        <h1 style="font-weight:400">{{ $post->title }}</h1>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <img class="img-fluid" src="{{ $post->img }}">
                <p class="my-4" style="line-height:2">{!! $post->content !!}</p>
            </div>
        </div>
    </div>
@endsection