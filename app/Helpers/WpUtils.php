<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use App\Models\CustomField;

/*
    Classe di funzioni Laravel che mima l'uso di funzioni WordPress (da cui prende il nome)
*/
class WpUtils
{
    public static function is_admin()
    {
        return Auth::check() && Auth::user()->hasRole('admin');
    }

    public static function is_user_logged_in(  )
    {
        return Auth::check();
    }

    public static function get_site_url()
    {
        return URL::to('/');
    }

    public static function get_permalink($id)
    {
        return route('posts.show', ['id' => $id]); // Adatta al tuo routing
    }

    public static function the_title($id)
    {
        $post = Post::find($id);
        return $post ? $post->title : '';
    }

    public static function get_the_content($id)
    {
        $post = Post::find($id);
        return $post ? $post->content : '';
    }

    public static function wp_logout_url()
    {
        return route('logout');
    }

    public static function wp_login_url()
    {
        return route('login');
    }

    // Transient handling
    public static function set_transient($key, $value, $expiration_in_minutes)
    {
        Cache::put($key, $value, now()->addMinutes($expiration_in_minutes));
    }

    public static function get_transient($key)
    {
        return Cache::get($key);
    }

    public static function delete_transient($key)
    {
        Cache::forget($key);
    }

    public static function the_permalink($id)
    {
        echo self::get_permalink($id);
    }

    public static function get_the_title($id)
    {
        $post = Post::find($id);
        return $post ? $post->title : '';
    }

    public static function get_the_excerpt($id, $length = 100)
    {
        $post = Post::find($id);
        return $post ? substr($post->content, 0, $length) . '...' : '';
    }

    public static function the_excerpt($id, $length = 100)
    {
        echo self::get_the_excerpt($id, $length);
    }

    public static function has_custom_field($field_key, $post_id)
    {
        return CustomField::where('post_id', $post_id)->where('field_key', $field_key)->exists();
    }

    public static function get_post_meta($post_id, $meta_key)
    {
        $meta = CustomField::where('post_id', $post_id)->where('field_key', $meta_key)->first();
        return $meta ? $meta->field_value : null;
    }

    public static function update_post_meta($post_id, $meta_key, $value)
    {
        CustomField::updateOrCreate(
            ['post_id' => $post_id, 'field_key' => $meta_key],
            ['field_value' => $value]
        );
    }    
}
