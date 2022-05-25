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

    public $incrementing = false;

    public function launches() {
        return $this->belongsToMany(Launch::class, 'articles_launches', 'article_id', 'launch_id');
    }

    public function events() {
        return $this->belongsToMany(Event::class, 'articles_events', 'article_id', 'event_id');
    }

    public function updateOrCreateLaunches($launches) {
        foreach ($launches as $launch)  {
            Launch::updateOrCreate(
                ['id' => $launch['id']],
                ['provider' => $launch['provider']]
            );
        }
        $this->launches()->syncWithoutDetaching(array_column($launches, 'id'));
    }

    public function updateOrCreateEvents($events) {
        foreach ($events as $event)  {
            Event::updateOrCreate(
                ['id' => $event['id']],
                ['provider' => $event['provider']]
            );
        }
        $this->events()->syncWithoutDetaching(array_column($events, 'id'));
    }
}
