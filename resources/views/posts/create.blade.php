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
@section('content')
    <div class="container">
        <h1 class="center-align">Nuovo Articolo</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="input-field">
                <input type="text" id="title" name="title" required>
                <label for="title">Titolo</label>
            </div>

            <div class="input-field">
                <input type="text" id="slug" name="slug" class="validate" value="" style="font-size: 0.9rem;">
                <label for="slug">Slug</label>
            </div>

            <div class="input-field">
                <textarea id="content" name="content" class="materialize-textarea"></textarea>
                <label for="content">Contenuto</label>
            </div>

            <button type="submit" class="btn waves-effect waves-light">Crea</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#content').trumbowyg();
        });
    </script>
    <script>
        // Slug handler
        document.getElementById('title').addEventListener('input', function() {
            const title = this.value;
            const slugField = document.getElementById('slug');
            
            if (!slugField.dataset.modified) {
                slugField.value = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
            }
        });

        document.getElementById('slug').addEventListener('input', function() {
            this.dataset.modified = true; // Segna che l'utente ha modificato lo slug manualmente
        });
    </script>
@endsection