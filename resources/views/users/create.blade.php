@extends('layouts.app')
@section('styles')
    <link href="{{ asset('css/create_user.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <h1>Crea un nuovo utente</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <span>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" required>
        </span>
        <span>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </span>
        <span>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </span>
        <span>
            <label for="role">Ruolo:</label>
            <select name="role" id="role" required>
                <option value="admin">Amministratore</option>
                <option value="editore">Editore</option>
                <option value="autore">Autore</option>
                <option value="collaboratore">Collaboratore</option>
                <option value="sottoscrittore">Sottoscrittore</option>
            </select>
        </span>
        <button type="submit">Crea Utente</button>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
</script>
@endsection