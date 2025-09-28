<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareSnippet extends Model
{
    use HasFactory;

    protected $table = 'fblog_share_snippets';

    protected $fillable = [
        'script_code',
        'html_code',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * Scope a query to only include active share snippets.
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
