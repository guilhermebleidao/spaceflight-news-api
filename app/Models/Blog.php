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

    public $incrementing = false;

    public function launches() {
        return $this->belongsToMany(Launch::class, 'blogs_launches', 'blog_id', 'launch_id');
    }

    public function events() {
        return $this->belongsToMany(Event::class, 'blogs_events', 'blog_id', 'event_id');
    }

    public function updateOrCreateLaunches(array $launches, bool $detach) {
        foreach ($launches as $launch)  {
            Launch::updateOrCreate(
                ['id' => $launch['id']],
                ['provider' => $launch['provider']]
            );
        }
        if ($detach) {
            $this->launches()->sync(array_column($launches, 'id'));
        } else {
            $this->launches()->syncWithoutDetaching(array_column($launches, 'id'));
        }
    }

    public function updateOrCreateEvents(array $events, bool $detach) {
        foreach ($events as $event)  {
            Event::updateOrCreate(
                ['id' => $event['id']],
                ['provider' => $event['provider']]
            );
        }
        if ($detach) {
            $this->events()->sync(array_column($events, 'id'));
        } else {
            $this->events()->syncWithoutDetaching(array_column($events, 'id'));
        }
    }
}
