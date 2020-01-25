@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div role="alert">
            {{ session('status') }}
        </div>
    @endif
            
    <div>
        <h1>Home</h1>
    </div>
@endsection


