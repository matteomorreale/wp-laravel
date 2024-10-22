@extends('layouts.app')

@section('content')
    <div class="app-blade_home-blade row">
        <div class="col s12 m8 offset-m2">
            <div class="card app-blade_home-blade__card-container">
                <div class="app-blade_home-blade card-content">
                    <span class="card-title">{{ __('Backend') }}</span>
                    {{ __('You are logged in!') }}
                    @if (session('status'))
                        <div class="card-panel green">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Dashboard</h1>
                    
                    <section class="app-blade_home-blade__section-functionalities-container">
                        <div class="container">
                            <div class="home logged-in private-areas-button-container users-area">
                                <a class="btn waves-effect waves-light" href="{{ route('users.index') }}">Gestione Utenti</a>
                            </div>
                            <br/>
                            <div class="home logged-in private-areas-button-container posts-area">
                                <p>
                                    <a class="btn waves-effect waves-light" href="{{ route('posts.index') }}">Gestione Post</a>
                                    <a class="btn waves-effect waves-light" href="{{ route('posts.create') }}">Crea Nuovo Post</a>
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection