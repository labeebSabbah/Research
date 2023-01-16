<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image'
    ];

    public $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_versions', 'version_id', 'post_id');
    }
}
