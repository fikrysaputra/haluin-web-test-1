<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $fillable = ['event_id', 'type', 'price', 'quota'];

    /**
     * RELASI: tiket milik satu event
     */

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    /**
     * RELASI: tiket bisa dibeli banyak user
     */
    public function userTickets()
    {
        return $this->hasMany(UserTickets::class);
    }
    
}
