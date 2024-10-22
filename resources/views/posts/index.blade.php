@extends('layouts.app')

@section('content')
    <div class="app-blade_home-blade row">
        <div class="col s12 m8 offset-m2">
            <div class="card app-blade_home-blade__card-container">
                <div class="app-blade_home-blade card-content">
                    <h1>Tutti gli articoli</h1>
                    
                    <table class="striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titolo</th>
                                <th>Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $post->slug) }}" class="btn">Visualizza</a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn">Modifica</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn red">Cancella</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
