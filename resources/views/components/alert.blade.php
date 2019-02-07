@if (Session::has('success'))
    <div class="alert alert-{{ $type ?? 'success' }}">
        {!! Session::get('success') !!}
    </div>
@endif