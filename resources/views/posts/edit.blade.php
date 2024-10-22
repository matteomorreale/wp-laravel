<?php
use App\Helpers\WpUtils;
?>

@extends('layouts.app')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
    <script src="{{WpUtils::get_site_url()}}/js/trumbowyg/dist/trumbowyg.min.js"></script>
    <link rel="stylesheet" href="{{WpUtils::get_site_url()}}/js/trumbowyg/dist/ui/trumbowyg.min.css">
    <style>
        .trumbowyg-box strong {
            font-family: auto;
        }
    </style>
@section('content')

<div class="container">
    <h1 class="center-align">Modifica Articolo con ID: {{ $post->id }}</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Questo permette di usare PUT per l'aggiornamento -->
        <div class="input-field">
            <input type="text" id="title" name="title" value="{{ $post->title }}" required>
            <label for="title">Titolo</label>
        </div>

        <div class="input-field">
            <input type="text" id="slug" name="slug" class="validate" value="{{ $post->slug }}" style="font-size: 0.9rem;">
            <label for="slug">Slug</label>
        </div>

        <div class="input-field">
            <textarea id="content" name="content" class="materialize-textarea">{{ $post->content }}</textarea>
            <label for="content">Contenuto</label>
        </div>

        <button type="submit" class="btn waves-effect waves-light">Aggiorna</button>
    </form>
</div>
    <script>
        $(document).ready(function() {
            $('#content').trumbowyg();
        });
    </script>
@endsection