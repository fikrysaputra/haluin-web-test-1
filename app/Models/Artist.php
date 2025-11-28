<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genre',
    ];

    /**
     * RELASI: banyak artist bisa ikut banyak event (many-to-many)
     */
    public function events()
    {
        return $this->belongsToMany(Event::class, 'artist_event', 'artist_id', 'event_id');
    }
}
