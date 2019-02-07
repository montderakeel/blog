@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>

@endsection