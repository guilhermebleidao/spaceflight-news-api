<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Launch extends Model
{
    use HasFactory;

    protected $table = 'launches';

    protected $fillable = ['id', 'provider'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    public $incrementing = false;
}
