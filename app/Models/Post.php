<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'slug'];

    public function customFields()
    {
        return $this->hasMany(CustomField::class);
    }
}