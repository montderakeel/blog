@extends('frontend.app')
@section('style')
  .card-text{
    color: #888;
    font-size: 14px;
    line-height: 1.5;
  }
  .card-actions a{
    color: #777;
    margin-right: 5px;
  }
  .card-actions a:hover{
    text-decoration: none;
    color: #333;
  }
@endsection
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        @forelse ($category->posts as $post)
          <div class="card my-3">
            <div class="row">
              <div class="col-md-5">
                <img class="img-fluid" src="{{ asset('storage/posts/' . $post->img) }}" alt="">
              </div>
              <div class="col-md-7">
                <div class="card-block p-3">
                  <h4 class="card-title font-weight-light">
                    {{ $post->title }}
                  </h4>
                  <div class="card-text">
                    <div>{!! str_limit($post->content, $limit = 150, $end = '...') !!}</div>
                    <div class="card-actions text-dark" style="font-size:12px">
                      <a href="#"><i class="fas fa-clock"></i> {{ $post->created_at->format('Y-m-d') }}</a>
                      <a href="#"><i class="fas fa-user"></i>  {{ $post->user->name }}</a>
                      <a href="#"><i class="fas fa-th"></i> {{ $post->category->name }}</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Card Post -->
        @empty
          Sorry There is no Posts!
        @endforelse
      </div>
    </div>
  </div>


@endsection
