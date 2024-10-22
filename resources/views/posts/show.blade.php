@extends('layouts.app')

@section('content')
    <div class="container single single-post">
        @if( !empty($post->title) )
            <h1>{{ $post->title }}</h1>
        @endif
        @if( !empty($post->content) )
            <p>{!! $post->content !!}</p>
        @endif
    </div>
@endsection