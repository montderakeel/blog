@extends('layouts.app')
@section('content')

<div class="container-fluid">

    {{-- Errors Or Success Message --}}
    @component('components.alert', ['type' => 'success'])
    @endcomponent
    {{-- Errors Or Success Message --}}

    <div class="post p-2 text-white bg-dark" style="border-bottom:1px solid #ccc;">
        <div class="row justify-content-between">
            <div class="col-md-5">POST TITLE</div>
            <div class="col-md-2"><i class="far fa-calendar-alt"></i> CREATED AT</div>
            <div class="col-sm-2"><i class="fas fa-th"></i> CATEGORY</div>
            <div class="col-md-3"><i class="fas fa-sliders-h"></i> ACTIONS</div>
        </div>
    </div>

    @if (empty($posts))
        <h1>Nice</h1>
    @endif

    @forelse ($posts as $post)
        <div class="post p-2 bg-white" style="border-bottom:1px solid #eee;">
            <div class="row justify-content-between">
                <div class="col-md-5">{{ $post['title'] }}</div>
                <div class="col-md-2"><i class="far fa-calendar-alt"></i> {{ $post->created_at->format('d M, Y') }}</div>
                <div class="col-sm-2">
                    <a href="{{ route('category.show', $post->category->id) }}"><i class="fas fa-th"></i> {{ $post->category->name }}</a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary btn-sm"><i class="far fa-eye"></i> View</a>
                    <a href="{{ route('post.edit', $post["id"]) }}" class="btn btn-success btn-sm"><i class="far fa-edit"></i> Edit</a>
                    <form style="display:inline-block" action="{{ route('post.destroy', $post['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-sm-12 text-danger box-no_data">
            THERE IS NO DATA
        </div>
    @endforelse

</div>

@endsection