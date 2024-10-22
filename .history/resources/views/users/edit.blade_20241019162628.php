@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica Utente</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="form-group">
                <label for="role">Ruolo</label>
                <select name="role" class="form-control" required>
                    @foreach (Spatie\Permission\Models\Role::all() as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Aggiorna</button>
        </form>
    </div>
@endsection