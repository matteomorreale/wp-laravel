<ul>
    <div class="sidebar logged-in private-areas-button-container users-area">
        <a class="btn waves-effect waves-light" href="{{ route('users.index') }}">Gestione Utenti</a>
    </div>
    <div class="sidebar logged-in private-areas-button-container posts-area">
        <p>
            <a class="btn waves-effect waves-light" href="{{ route('posts.index') }}">Gestione Post</a>
            <a class="btn waves-effect waves-light" href="{{ route('posts.create') }}">Crea Nuovo Post</a>
        </p>
    </div>
</ul>