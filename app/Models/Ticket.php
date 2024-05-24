<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;


    public function musicEvent() {
        return $this->belongsTo(MusicEvent::class);
    }
}
