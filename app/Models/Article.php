<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'url',
        'imageUrl',
        'newsSite',
        'summary',
        'publishedAt',
        'updatedAt',
        'featured'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function launches() {
        return $this->belongsToMany(Launch::class, 'articles_launches', 'article_id', 'launch_id');
    }

    public function events() {
        return $this->belongsToMany(Event::class, 'articles_events', 'article_id', 'event_id');
    }
}
