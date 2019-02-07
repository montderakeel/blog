@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="title">Enter New Title For This Post</label>
                            <input type="text" class="form-control" name="title" value="{{ $post['title'] }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="category">Select New Category</label>
                            <select name="category_id" id="category" class="form-control">
                                @foreach ($categories as $category)
                                    <option
                                    @if ($post->category_id == $category['id'])
                                        selected
                                    @endif
                                    value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="content" id="content" cols="10" rows="10" class="form-control">{{ $post->content }}</textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-sm">
                </form>
            </div>
        </div>
    </div>
@endsection