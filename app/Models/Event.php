<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'start_date',
        'end_date',
        'poster',
        'thumbnail',
        'quota_reguler',
        'quota_vip',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date'   => 'datetime',
    ];

    /**
     * RELASI: Event punya banyak tiket
     */
    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }

    /**
     * RELASI: Event punya banyak artist (many-to-many)
     */
    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'artist_event', 'event_id', 'artist_id');
    }

    /**
     * RELASI: Event punya banyak user tickets melalui tiket
     */
    public function userTickets()
    {
        return $this->hasManyThrough(
            UserTicket::class,  // target model
            Tickets::class,      // intermediate model
            'event_id',         // FK di tabel tickets
            'ticket_id',        // FK di tabel user_tickets
            'id',               // PK di tabel events
            'id'                // PK di tabel tickets
        );
    }

    /**
     * Helper: event terdekat
     */
    public static function nearest()
    {
        return self::orderBy('start_date', 'asc')->first();
    }
}
