@extends('master')
<h1>Contact Page</h1>

@section('content')
    @if($email)
        {{ $email }}
    @else
        No email address given
    @endif
@endsection
