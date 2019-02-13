@extends('layouts.app')

@section('content')

<div class="container-fluid">
  @component('components.alert', ['type' => 'success'])
  @endcomponent
  <div class="card">
      <div class="card-body">
          <form action="{{ route('category.update', $category->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>New Category Name</label>
                  <input type="text" name="name" class="form-control" value="{{ $category->name }}">
              </div>
              <input class="btn btn-success btn-sm" type="submit" value="Update">
          </form>
      </div>
  </div>
</div>

@endsection
