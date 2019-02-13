@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- Errors Or Success Message --}}
    @if ($errors->any())
        <div class="alert alert-light">
            <ul class="navbar-nav">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- Errors Or Success Message --}}

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
                        <input type="text" name="title" placeholder="What Are You Thinking About" class="form-control input-title">
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
                <img id="img-preview" class="card-img-top" src="https://via.placeholder.com/850x487.jpg?text=Select+Image">
                <div class="card-body">
                    <div class="form-group">
                        <label>Selete Image</label>
                        <input id="file-preview" class="form-control-file" type="file" onchange="previewFile" name="img">
                    </div>
                </div>
            </div>

        </div>

    </div>

</form>
</div>

@endsection
