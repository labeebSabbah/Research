<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'title',
        'description',
        'pages',
        'university',
        'published_on',
        'status',
        'file',
        'paid',
        'category_id',
        'keywords',
        'invoice_id',
        'research_major',
        'exact_specialty_research',
        'search_language',
        'pay_amount',
        'paid_at',
        'certificate_file'
    ];

    protected $dateFormat = 'Y-m-d';

    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
        'published_on' => 'date:Y-m-d',
        'paid_at' => 'date:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function versions()
    {
        return $this->belongsToMany(Version::class, 'posts_versions', 'post_id', 'version_id');
    }
}
