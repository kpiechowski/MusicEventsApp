<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPool extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'music_event_id',
    ];

    public static function boot(){
        parent::boot();

        static::deleting(function ($ticketPool) {
            $ticketPool->tickets()->each(function ($ticket) {
                $ticket->delete();
            });
        });
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    

    public function musicEvent() {
        return $this->belongsTo(MusicEvent::class);
    }
}
