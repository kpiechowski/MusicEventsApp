<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPool extends Model
{
    use HasFactory;


    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    public function musicEvent() {
        return $this->belongsTo(MusicEvent::class);
    }
}
