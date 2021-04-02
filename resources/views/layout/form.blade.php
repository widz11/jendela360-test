@extends('layout.admin')

@section('content')
    <h3>{{ $formTitle }}</h3>
    @if (session('message-form'))
        <div style="color:red;">
            {{ session('message-form') }}
        </div>
    @endif
    <form action="{{ $formUrl }}" method="POST">
        @csrf
        @yield('content-form')
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection