@extends('frontend.app')

{{-- @section('title', 'Blog Categories') --}}

@section('content')

  <div class="container">
    <div class="row">
      @forelse ($categories as $category)
        <div class="col-md-4">
          <div class="card m-2">
            <img class="card-img-top" src="http://localhost:8000/storage/posts/vebFH8eWlbYsDdUARKiXuEBwhNefoidBqkXmGMQt.jpeg">
            <div class="card-body">
              <h4 class="text-center text-uppercase">{{ $category->name }}</h4>
            </div>
          </div>
        </div>
      @empty
        No Categoryes In This Blog
      @endforelse
    </div>
  </div>


@endsection
