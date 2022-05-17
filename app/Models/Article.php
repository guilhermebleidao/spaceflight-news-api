<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'featured',
        'title',
        'url',
        'urlImage',
        'newsSite',
        'summary',
        'publishedAt'
    ];
}
