## About Laravel Wp-Like Utils
Laravel WP-Like Utils è una versione personalizzata di Laravel 11 pensata per facilitare il passaggio da WordPress a Laravel. Fornisce una gestione basilare di utenti e post, e include una classe WpUtils che riproduce funzioni comuni di WordPress per un'integrazione più semplice in Laravel.

## Caratteristiche principali 

Gestione minima di utenti con funzionalità CRUD.
Inserimento e gestione di post.
WpUtils: una classe che replica funzioni WordPress come is_admin e get_site_url per facilitare il passaggio da WordPress a Laravel.

## Requisiti
PHP >= 8.1
Composer
Laravel 11
## Installazione
Clona il repository:
git clone https://github.com/tuo_username/laravel-wp-like-utils.git

Installa le dipendenze con Composer:
composer install

Copia il file .env.example e crea un nuovo file .env:
cp .env.example .env

Configura il tuo file .env con le informazioni del database.

Esegui le migrazioni:
php artisan migrate

Avvia il server di sviluppo:
php artisan serve

Ora puoi accedere al progetto all'indirizzo http://localhost:8000.

## Utilizzo di wp_utils
La classe WpUtils offre funzioni simili a WordPress per facilitare lo sviluppo con Laravel. 
Funzioni incluse:

wp_utils
La classe WpUtils contiene una serie di funzioni che replicano le API di WordPress per semplificare lo sviluppo su Laravel.

Funzioni disponibili
is_admin(): Verifica se l'utente corrente è un amministratore.

if (WpUtils::is_admin()) {
    // codice per amministratori
}
is_user_logged_in(): Verifica se l'utente è loggato.

if (WpUtils::is_user_logged_in()) {
    // codice per utenti loggati
}
get_site_url(): Restituisce l'URL del sito.

echo WpUtils::get_site_url();
get_permalink($id): Restituisce il permalink di un post con un dato ID.

echo WpUtils::get_permalink($postId);
the_title($id): Restituisce il titolo del post con un dato ID.

echo WpUtils::the_title($postId);
get_the_content($id): Restituisce il contenuto del post con un dato ID.

echo WpUtils::get_the_content($postId);
wp_logout_url(): Restituisce l'URL per effettuare il logout.

echo WpUtils::wp_logout_url();
wp_login_url(): Restituisce l'URL per effettuare il login.

echo WpUtils::wp_login_url();
set_transient($key, $value, $expiration_in_minutes): Salva un valore temporaneo (transient) nella cache.

WpUtils::set_transient('my_key', 'my_value', 60); // 60 minuti
get_transient($key): Recupera un valore temporaneo (transient) dalla cache.

$value = WpUtils::get_transient('my_key');
delete_transient($key): Elimina un valore temporaneo (transient) dalla cache.

WpUtils::delete_transient('my_key');
the_permalink($id): Stampa il permalink del post con un dato ID.

WpUtils::the_permalink($postId);
get_the_excerpt($id, $length = 100): Restituisce un estratto del contenuto del post con un dato ID.

echo WpUtils::get_the_excerpt($postId, 150); // Estrai 150 caratteri
the_excerpt($id, $length = 100): Stampa un estratto del contenuto del post con un dato ID.

WpUtils::the_excerpt($postId, 150);
has_custom_field($field_key, $post_id): Verifica se il post ha un custom field con un dato field_key.

if (WpUtils::has_custom_field('my_field', $postId)) {
    // il post ha il custom field
}
get_post_meta($post_id, $meta_key): Restituisce il valore di un custom field per un dato post e chiave.

$meta_value = WpUtils::get_post_meta($postId, 'my_field');
update_post_meta($post_id, $meta_key, $value): Aggiunge o aggiorna un custom field per un dato post e chiave.

WpUtils::update_post_meta($postId, 'my_field', 'new_value');

## Contributing
Grazie per voler contribuire a Laravel WP-Like Utils! Sentiti libero di aprire una pull request o creare un issue per discutere nuove funzionalità o miglioramenti.

## License
Laravel WP-Like Utils è distribuito sotto la licenza MIT.