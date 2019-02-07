@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
        @forelse ($categories as $category)
            <div class="col-sm-3">
                <a href="{{ route('category.show', $category->id) }}" class="box d-block text-center bg-primary my-2 py-4 text-white">
                    <span class="display-4 position-absolute"
                    style="top:15px;left:25px;"
                    >{{ count($category->posts) }}</span>
                    <span style="font-size:20px">{{ $category->name }}</span>
                </a>
            </div>
        @empty
            <div class="box-no_data">There is No Data Eat</div>
        @endforelse
        </div>
    </div>
@endsection