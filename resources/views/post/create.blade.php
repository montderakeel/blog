@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-9">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <div class="lead">Create New Post</div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input required type="text" name="title" placeholder="What Are You Thinking About" class="form-control input-title">
                    </div>
                    <div class="form-group">
                        <textarea name="content" id="editor"></textarea>
                    </div>
                    <input type="submit" class="btn btn-dark" value="Publish The Post">
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-body">
                    @foreach ($categories as $category)
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="category" id="category_{{ $category['id']}}" 
                            @if ($category['name'] === 'test')
                                checked
                            @endif
                            value="{{ $category['id'] }}">
                            <label for="category_{{ $category['id'] }}">{{ $category['name'] }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- card for upload imgs --}}
            <div class="card my-2">
                <div class="card-body">
                    <div class="form-group">
                        <label>Selete Image</label>
                        <input class="form-control-file" type="file" name="img">
                    </div>
                </div>
            </div>
            
        </div>

    </div>

</form>
</div>

@endsection