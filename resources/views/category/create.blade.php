@extends('layouts.app')

@section('content')

<div class="container-fluid">
  @component('components.alert', ['type' => 'success'])
  @endcomponent
  <div class="card">
      <div class="card-body">
          <form action="{{ route('category.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label>Name Of Category</label>
                  <input type="text" name="name" class="form-control">
              </div>
              <input class="btn btn-primary btn-sm" type="submit" value="Submit">
          </form>
      </div>
  </div>
  <div class="card my-2">

    <div class="category bg-dark text-white p-2 border-bottom text-uppercase">
      <div class="row justify-content-between">
        <div class="col-md-6">
          title of category
        </div>
        <div class="col-md-1">
          posts
        </div>
        <div class="col-md-2">
          create at
        </div>
        <div class="col-md-3">
          actions
        </div>
      </div>
    </div>

    @foreach($categories as $category)
      <div class="category bg-white p-2 border-bottom">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-6">
            {{ $category->name }}
          </div>
          <div class="col-sm-1">
            {{ count($category->posts) }}
          </div>
          <div class="col-md-2">
            {{ $category->created_at->format('Y-m-d') }}
          </div>
          <div class="col-md-3">
            <a class="btn btn-primary btn-sm" href="{{ route('category.show', $category->id) }}"><i class="fas fa-eye fa-fw"></i> View</a>
            <a class="btn btn-success btn-sm" href="{{ route('category.edit', $category->id) }}"><i class="far fa-edit fa-fw"></i> Edit</a>
            <form class="d-inline" action="{{ route('category.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt fa-fw"></i> Delete</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>

</div>


@endsection
