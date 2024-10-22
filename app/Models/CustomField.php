<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $fillable = ['post_id', 'field_key', 'field_value'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}