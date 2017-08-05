@extends('layouts.app')
     @if (count($microposts) > 0)
        @section('content')
            @include('microposts.followings', ['microposts' => $microposts])
        @endsection
    @endif