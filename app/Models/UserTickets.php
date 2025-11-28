<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTickets extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ticket_id',  // Corrected this field to 'ticket_id'
        'quantity',
        'qr_code',
        'status',
        'purchased_at',
        'nama',    // untuk guest
        'email',   // untuk guest
        'nohp',    // untuk guest
    ];

    protected $casts = [
        'purchased_at' => 'datetime',
    ];

    /**
     * RELASI: user tickets dimiliki oleh user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * RELASI: user tickets milik satu tiket
     */
    public function ticket()
    {
        return $this->belongsTo(Tickets::class, 'ticket_id');
    }


    /**
     * RELASI: event melalui tiket
     */
    public function event()
    {
        return $this->hasOneThrough(
            Event::class,
            Tickets::class,
            'id',        // Foreign key Tickets di UserTickets
            'id',        // Foreign key Event di Tickets
            'ticket_id', // Corrected the key from 'tickets_id' to 'ticket_id'
            'event_id'   // Foreign key Event di Tickets
        );
    }
}
