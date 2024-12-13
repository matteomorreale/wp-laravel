## About Laravel Wp-Like Utils
Laravel WP-Like Utils is a customized version of Laravel 11 designed to ease the transition from WordPress to Laravel. It provides basic user and post management and includes a `WpUtils` class that replicates common WordPress functions for simpler integration with Laravel.

## Main Features

- Minimal user management with CRUD functionality.
- Post creation and management.
- `WpUtils`: A class replicating WordPress functions like `is_admin` and `get_site_url` to facilitate the transition from WordPress to Laravel.

## Requirements

- PHP >= 8.1
- Composer
- Laravel 11

## Installation

Clone the repository:
```bash
git clone https://github.com/your_username/laravel-wp-like-utils.git
```

Install dependencies with Composer:
```bash
composer install
```

Copy the `.env.example` file and create a new `.env` file:
```bash
cp .env.example .env
```

Configure your `.env` file with your database information.

Run the migrations:
```bash
php artisan migrate
```

Start the development server:
```bash
php artisan serve
```

You can now access the project at `http://localhost:8000`.

## Using `wp_utils`

The `WpUtils` class offers WordPress-like functions to facilitate Laravel development.  
Included functions:

### `wp_utils`

The `WpUtils` class includes several functions that replicate WordPress APIs for simplified development in Laravel.

### Available Functions

#### `is_admin()`: Checks if the current user is an administrator.
```php
if (WpUtils::is_admin()) {
    // code for administrators
}
```

#### `is_user_logged_in()`: Checks if the user is logged in.
```php
if (WpUtils::is_user_logged_in()) {
    // code for logged-in users
}
```

#### `get_site_url()`: Returns the site URL.
```php
echo WpUtils::get_site_url();
```

#### `get_permalink($id)`: Returns the permalink of a post with a given ID.
```php
echo WpUtils::get_permalink($postId);
```

#### `the_title($id)`: Returns the title of the post with a given ID.
```php
echo WpUtils::the_title($postId);
```

#### `get_the_content($id)`: Returns the content of the post with a given ID.
```php
echo WpUtils::get_the_content($postId);
```

#### `wp_logout_url()`: Returns the URL to log out.
```php
echo WpUtils::wp_logout_url();
```

#### `wp_login_url()`: Returns the URL to log in.
```php
echo WpUtils::wp_login_url();
```

#### `set_transient($key, $value, $expiration_in_minutes)`: Saves a temporary value (transient) in the cache.
```php
WpUtils::set_transient('my_key', 'my_value', 60); // 60 minutes
```

#### `get_transient($key)`: Retrieves a temporary value (transient) from the cache.
```php
$value = WpUtils::get_transient('my_key');
```

#### `delete_transient($key)`: Deletes a temporary value (transient) from the cache.
```php
WpUtils::delete_transient('my_key');
```

#### `the_permalink($id)`: Prints the permalink of a post with a given ID.
```php
WpUtils::the_permalink($postId);
```

#### `get_the_excerpt($id, $length = 100)`: Returns an excerpt of the post content with a given ID.
```php
echo WpUtils::get_the_excerpt($postId, 150); // Extract 150 characters
```

#### `the_excerpt($id, $length = 100)`: Prints an excerpt of the post content with a given ID.
```php
WpUtils::the_excerpt($postId, 150);
```

#### `has_custom_field($field_key, $post_id)`: Checks if the post has a custom field with a given field key.
```php
if (WpUtils::has_custom_field('my_field', $postId)) {
    // the post has the custom field
}
```

#### `get_post_meta($post_id, $meta_key)`: Returns the value of a custom field for a given post and key.
```php
$meta_value = WpUtils::get_post_meta($postId, 'my_field');
```

#### `update_post_meta($post_id, $meta_key, $value)`: Adds or updates a custom field for a given post and key.
```php
WpUtils::update_post_meta($postId, 'my_field', 'new_value');
```

## Contributing

Thank you for your interest in contributing to Laravel WP-Like Utils! Feel free to open a pull request or create an issue to discuss new features or improvements.

## License

Laravel WP-Like Utils is licensed under the MIT License.
