<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicEvent extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }
    public function pools() {
        return $this->hasMany(TicketPool::class);
    }



}
