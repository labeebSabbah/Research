<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'num_of_posts',
        'cover_file',
        'description_file',
        'certification_file'
    ];

    public $timestamps = false;

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
