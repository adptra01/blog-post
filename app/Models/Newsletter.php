<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $table = 'fblog_news_letters';

    protected $fillable = [
        'email',
        'subscribed',
    ];

    protected $casts = [
        'subscribed' => 'boolean',
    ];
}
