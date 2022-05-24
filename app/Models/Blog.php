<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
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
        'updatedAt'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function launches() {
        return $this->belongsToMany(Launch::class, 'blogs_launches', 'blog_id', 'launch_id');
    }

    public function events() {
        return $this->belongsToMany(Event::class, 'blogs_events', 'blog_id', 'event_id');
    }
}
