@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('storage/posts/' . $post->img) }}" alt="{{ $post->img }}">
                    <div class="card-body">
                        <h1 style="font-weight:400">{{ $post->title }}</h1>
                        <p class="card-text">{!! $post->content !!}</p>
                    </div>
                    <div class="card-footer bg-light">
                        This is post published on <strong>{{ $post->category->name }}</strong>
                        at <strong>{{ $post->created_at->format('Y-m-d') }}</strong>
                        by <strong>{{ $post->user->name }}</strong>
                        <div class="float-right">
                            <a href="{{ route('post.edit', $post->id) }}">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection