<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public function generatePathToQr() {
        return;
    }

    public function musicEvent() {
        return $this->belongsTo(MusicEvent::class);
    }

    public function ticketPool(){
        return $this->belongsTo(TicketPool::class);
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
        
    }
}
