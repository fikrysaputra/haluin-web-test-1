<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tickets_id',
        'quantity'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tickets() {
        return $this->belongsTo(Tickets::class);
    }
}
