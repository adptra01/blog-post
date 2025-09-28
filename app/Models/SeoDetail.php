<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoDetail extends Model
{
    use HasFactory;

    protected $table = 'fblog_seo_details';

    protected $fillable = [
        'post_id',
        'title',
        'keywords',
        'description',
    ];

    protected $casts = [
        'keywords' => 'array',
    ];

    /**
     * Get the post that owns the SEO details.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
